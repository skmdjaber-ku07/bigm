<?php

namespace App\Listeners;

use App\Events\UserSaved;
use App\Models\Applicant;
use App\Models\Exam;
use App\Library\BdGeo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserSavedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Event  $event
     * @return void
     */
    public function handle(UserSaved $event)
    {
        $data = $event->request->all();
        $applicant = $event->applicant;
        $applicant_exams_count = 0;
        $applicant_trainings_count = 0;
        $data['result'] = \Arr::map($event->request->result, function ($value, $key) {
            return floatval($value);
        });

        // Save applicant data
        $geo_list = BdGeo::getGeoList();
        $applicant_data = [
            'division' => json_encode([
                'id' => $event->request->division_id,
                'name' => $geo_list['dropdown']['divisions'][(int) $event->request->division_id],
            ]),
            'district' => json_encode([
                'id' => $event->request->district_id,
                'name' => $geo_list['dropdown']['districts'][(int) $event->request->district_id],
            ]),
            'upazila' => json_encode([
                'id' => $event->request->upazila_id,
                'name' => $geo_list['dropdown']['upazilas'][(int) $event->request->upazila_id],
            ]),
            'address_details' => $event->request->address_details,
            'language' => json_encode($event->request->language),
        ];

        $applicant_data = Applicant::uploadFile($event->request, $applicant_data, $applicant);

        if (is_null($applicant)) {
            $applicant = $event->user->applicant()->create($applicant_data);
        } else {
            $applicant->update($applicant_data);
        }

        // Save Applicant's exam data
        foreach ($event->request->exam as $index => $exam_id) {
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
                    if (! is_null($event->applicant) && $applicant_exams_count == 0) {
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

        // Save Applicant's trainings data
        if ($event->request->training) {
            foreach ($event->request->training_name as $key => $training) {
                if (isset($training) && ! empty($training)) {
                    if (! is_null($event->applicant) && $applicant_trainings_count == 0) {
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
            if (! is_null($event->applicant)) {
                $applicant->trainings()->delete();
            }
        }
    }
}
