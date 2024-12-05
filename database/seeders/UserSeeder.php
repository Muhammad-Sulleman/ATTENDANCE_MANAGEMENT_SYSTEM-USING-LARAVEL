<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Insert Pakistani students into the user table
        User::create([
            'fullname' => 'Teacher Name',
            'email' => 'teacher@example.com',
            'role' => 'teacher',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'fullname' => 'Student Name',
            'email' => 'student@example.com',
            'role' => 'student',
            'password' => bcrypt('password'),
        ]);


        // Add more students as needed
    }
}
