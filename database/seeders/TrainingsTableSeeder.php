<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('trainings')->truncate();

        \DB::table('trainings')->insert([
            [
                'applicant_id' => 1,
                'name' => 'PGD',
                'details' => 'Post Graduation Diploma',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 1,
                'name' => 'CCNA',
                'details' => 'CCNA exam covers networking fundamentals, IP services, security fundamentals, automation and programmability. Designed for agility and versatility',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
