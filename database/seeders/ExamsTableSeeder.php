<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('exams')->truncate();

        $exams = [
            [
                'name' => 'SSC/Equivalent',
                'level' => 'board',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HSC/Equivalent',
                'level' => 'board',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Graduation/Equivalent',
                'level' => 'university',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Masters/Equivalent',
                'level' => 'university',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('exams')->insert($exams);
    }
}
