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
            ['name' => 'Barisal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chittagong', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Comilla', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dhaka', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dinajpur', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jessore', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mymensingh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rajshahi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sylhet', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madrasah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Technical', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'DIBS(Dhaka)', 'created_at' => now(), 'updated_at' => now()],
        ];

        \DB::table('boards')->insert($boards);
    }
}
