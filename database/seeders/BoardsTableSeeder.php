<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('boards')->truncate();

        $boards = [
            ['name' => 'Barisal'],
            ['name' => 'Chittagong'],
            ['name' => 'Comilla'],
            ['name' => 'Dhaka'],
            ['name' => 'Dinajpur'],
            ['name' => 'Jessore'],
            ['name' => 'Mymensingh'],
            ['name' => 'Rajshahi'],
            ['name' => 'Sylhet'],
            ['name' => 'Madrasah'],
            ['name' => 'Technical'],
            ['name' => 'DIBS(Dhaka)'],
        ];

        \DB::table('boards')->insert($boards);
    }
}
