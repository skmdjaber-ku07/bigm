<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('applicants')->truncate();

        \DB::table('applicant_exam')->truncate();

        $applicants = [
            [
                'user_id' => 2,
                'division' => json_encode(['id' => 3, 'name' => 'Dhaka']),
                'district' => json_encode(['id' => 6, 'name' => 'Kishoreganj']),
                'upazila' => json_encode(['id' => 185, 'name' => 'Kishoreganj Sadar']),
                'address_details' => 'Roshidabad',
                'language' => json_encode(['bangla', 'english', 'french']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'division' => json_encode(['id' => 8, 'name' => 'Mymensingh']),
                'district' => json_encode(['id' => 10, 'name' => 'Mymensingh']),
                'upazila' => json_encode(['id' => 217, 'name' => 'Mymensingh Sadar']),
                'address_details' => 'Vabkhali',
                'language' => json_encode(['bangla', 'english']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('applicants')->insert($applicants);

        \DB::table('applicant_exam')->insert([
            [
                'applicant_id' => 1,
                'exam_id' => 1,
                'institute_type' => 'board',
                'institute_id' => 3,
                'result' => 4.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 1,
                'exam_id' => 2,
                'institute_type' => 'board',
                'institute_id' => 3,
                'result' => 4.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 1,
                'exam_id' => 3,
                'institute_type' => 'university',
                'institute_id' => 13,
                'result' => 3.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 1,
                'exam_id' => 4,
                'institute_type' => 'university',
                'institute_id' => 3,
                'result' => 3.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
