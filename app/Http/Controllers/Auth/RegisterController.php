<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Exam;
use App\Library\BdGeo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $data['result'] = \Arr::map($request->result, function ($value, $key) {
            return floatval($value);
        });

        $validation = Applicant::validate($data);

         if ($validation->passes()) {
            event(new Registered($user = $this->create($request->all())));

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

            $applicant_data = Applicant::uploadFile($request, $applicant_data);
            $applicant = $user->applicant()->create($applicant_data);

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
                        $applicant->exams()->attach($exam_id, [
                            'institute_type' => $exam->level,
                            'institute_id' => $institute->id,
                            'result' => $data['result'][$index],
                        ]);
                    }
                }
            }

            if ($request->training) {
                foreach ($request->training_name as $key => $training) {
                    if (isset($training) && $training !== null && $training !== '') {
                        $applicant->trainings()->create([
                            'name' => $training,
                            'details' => $data['training_details'][$key],
                        ]);
                    }
                }
            }

            return response()->json(['status' => true, 'message' => 'Successfully saved!', 'reset' => true]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validation->getMessageBag()->toArray(),
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(now()->format('m_d_H_i')),
        ]);
    }
}
