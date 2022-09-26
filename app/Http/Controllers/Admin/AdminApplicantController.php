<?php

namespace App\Http\Controllers\Admin;

use App\Library\BdGeo;
use App\Models\Applicant;
use App\Models\Exam;
use App\Models\Board;
use App\Models\University;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminApplicantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'auth.type:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.applicants.index');
    }

    /**
     * JSON format listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        return \DataTables::of(Applicant::with('user')->latest()->get())->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return view('admin.applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $data = $request->all();
        $applicant_exams_count = 0;
        $applicant_trainings_count = 0;
        $data['result'] = \Arr::map($request->result, function ($value, $key) {
            return floatval($value);
        });

        $validation = Applicant::validate($data);

        // Update posted data if validation passes.
        if ($validation->passes()) {
            // Update User data which is associated with the applicant
            $applicant->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            // Update the applicant data
            $geo_list = BdGeo::getGeoList();
            $applicant_data = [
                'division' => json_encode([
                    'id' => $request->division_id,
                    'name' => $geo_list['dropdown']['divisions'][(int) $request->division_id],
                ]),
                'district' => json_encode([
                    'id' => $request->district_id,
                    'name' => $geo_list['dropdown']['districts'][(int) $request->district_id],
                ]),
                'upazila' => json_encode([
                    'id' => $request->upazila_id,
                    'name' => $geo_list['dropdown']['upazilas'][(int) $request->upazila_id],
                ]),
                'address_details' => $request->address_details,
                'language' => json_encode($request->language),
            ];

            $applicant_data = Applicant::uploadFile($request, $applicant_data, $applicant);

            $applicant->update($applicant_data);

            // Update Applicant's exam data
            foreach ($request->exam as $index => $exam_id) {
                // Check sequential institute and result
                if (array_key_exists($index, $data['institute'])
                    && array_key_exists($index, $data['result'])
                ) {
                    $exam = Exam::find($exam_id);
                    $institute = \DB::table(\Str::plural($exam->level))
                                    ->whereId($data['institute'][$index])
                                    ->first();

                    // Check valid institute
                    if (isset($institute)) {
                        if ($applicant_exams_count == 0) {
                            \DB::table('applicant_exam')->whereApplicantId($applicant->id)->delete();
                        }

                        $applicant->exams()->attach($exam_id, [
                            'institute_type' => $exam->level,
                            'institute_id' => $institute->id,
                            'result' => $data['result'][$index],
                        ]);

                        $applicant_exams_count++;
                    }
                }
            }

            // Update Applicant's trainings data
            if ($request->training) {
                foreach ($request->training_name as $key => $training) {
                    if (isset($training) && $training !== null && $training !== '') {
                        if ($applicant_trainings_count == 0) {
                            $applicant->trainings()->delete();
                        }

                        $applicant->trainings()->create([
                            'name' => $training,
                            'details' => $data['training_details'][$key],
                        ]);

                        $applicant_trainings_count++;
                    }
                }
            } else {
                $applicant->trainings()->delete();
            }

            return response()->json(['status' => true, 'message' => 'Update was successful', 'reset' => false]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validation->getMessageBag()->toArray(),
        ]);
    }
}
