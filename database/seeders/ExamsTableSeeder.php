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
                'level' => 'school',
            ],
            [
                'name' => 'HSC/Equivalent',
                'level' => 'college',
            ],
            [
                'name' => 'Graduation/Equivalent',
                'level' => 'university',
            ],
            [
                'name' => 'Masters/Equivalent',
                'level' => 'university',
            ],
        ];

        \DB::table('exams')->insert($exams);
    }
}
