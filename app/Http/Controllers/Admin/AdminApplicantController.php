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
        $data['divisions_list'] = BdGeo::getDivisions()
                                       ->pluck('name', 'id')
                                       ->prepend('Select Division', '');

        $data['districts_list'] = BdGeo::getDistricts()
                                       ->whereIn('division_id', [$applicant->division_id])
                                       ->pluck('name', 'id')
                                       ->prepend('Select District', '');

        $data['upazilas_list'] = BdGeo::getUpazilas()
                                      ->whereIn('district_id', [$applicant->district_id])
                                      ->pluck('name', 'id')
                                      ->prepend('Select Upazila', '');

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
        //
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
