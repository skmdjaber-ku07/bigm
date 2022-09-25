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
        $data = BdGeo::getGeoList();
        $data['exams_list'] = Exam::select('name', 'id', 'level')->get();
        $data['boards_list'] = Board::pluck('name', 'id')->prepend('Select Board', '');
        $data['universities_list'] = University::pluck('name', 'id')->prepend('Select University', '');

        return view('admin.applicants.edit', compact('applicant', 'data'));
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
        $validation = Applicant::validate($request->all());

        // Update posted data if validation passes.
        if ($validation->passes()) {
            // Exam and Trainings Validation

            $applicant->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $geo_list = BdGeo::getGeoList();

            $applicant->update([
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
            ]);

            if (count($request->exam)) {
                $applicant->exams()->delete();
                \DB::table('applicant_exam')->whereApplicantId($applicant->id)->delete();

                foreach ($request->exam as $index => $exam_id) {
                    $exam = Exam::find($exam_id);

                    if (isset($exam)) {
                        $institute = \DB::table(\Str::plural($exam->level))
                                        ->whereId($request->institute[$index])
                                        ->first();

                        if (isset($institute)
                            && is_array($request->result)
                            && array_key_exists($index, $request->result)
                            && is_numeric($request->result[$index])
                        ) {
                            $applicant->exams()->attach($exam_id, [
                                'institute_type' => $exam->level,
                                'institute_id' => $institute->id,
                                'result' => $request->result[$index],
                            ]);
                        }
                    }
                }
            }

            if ($request->training && count($request->training_name)) {
                $applicant->trainings()->delete();

                foreach ($request->training_name as $key => $training) {
                    if (isset($training) && $training !== null && $training !== '') {
                        $applicant->trainings()->create([
                            'name' => $training,
                            'details' => $request->training_details[$key],
                        ]);
                    }
                }
            }

            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'data' => $request->all(), 'errors' => $validation->getMessageBag()->toArray()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
