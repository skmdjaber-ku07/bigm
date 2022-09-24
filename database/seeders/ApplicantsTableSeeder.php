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
    }
}
