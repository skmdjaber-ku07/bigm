<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            UsersTableSeeder::class,
            ApplicantsTableSeeder::class,
            UniversitiesTableSeeder::class,
            BoardsTableSeeder::class,
            ExamsTableSeeder::class,
            TrainingsTableSeeder::class,
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
