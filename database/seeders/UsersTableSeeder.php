<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        $users = [
            [
                'name' => 'Super Admin',
                'type' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('secret'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mamun',
                'type' => 'applicant',
                'email' => 'bdabdulla@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('secret'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mhabub',
                'type' => 'applicant',
                'email' => 'mhabub@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('secret'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('users')->insert($users);
    }
}
