<?php

namespace App\Http\Controllers\Admin;

use App\Models\Applicant;
use App\Events\UserSaved;
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
        return \DataTables::of(Applicant::with('user')->latest()->get())
                        ->filter(function ($instance) use ($request) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                $status = true;
                                $text = ['name', 'email'];
                                $select = ['division_id', 'district_id', 'upazila_id'];

                                // Text type field filter
                                foreach ($text as $key => $attribute) {
                                    if ($request->has($attribute) && ! empty($request->$attribute)) {
                                        $status = str_contains(strtolower($row[$attribute]), strtolower($request->$attribute));
                                    }
                                }

                                // Dropdown type field filter
                                foreach ($select as $key => $attribute) {
                                    if ($request->has($attribute)
                                        && ! empty($request->$attribute)
                                        && $row[$attribute] != $request->$attribute
                                    ) {
                                        $status = false;
                                    }
                                }

                                return $status;
                            });
                        })->make(true);
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
        $validation = Applicant::validate($request->all(), $applicant);

        // Update posted data if validation passes.
        if ($validation->passes()) {
            // Update User data which is associated with the applicant
            $applicant->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            event(new UserSaved($request, $applicant->user, $applicant));

            return response()->json(['status' => true, 'message' => 'Update was successful', 'reset' => false]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validation->getMessageBag()->toArray(),
        ]);
    }
}
