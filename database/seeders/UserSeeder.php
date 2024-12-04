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
            'fullname' => 'Ali Khan',
            'email' => 'ali.khan@example.com',
            'class' => '10th Grade',
            'role' => 'student',
        ]);

        User::create([
            'fullname' => 'Fatima Ahmed',
            'email' => 'fatima.ahmed@example.com',
            'class' => '10th Grade',
            'role' => 'student',
        ]);

        User::create([
            'fullname' => 'Sara Malik',
            'email' => 'sara.malik@example.com',
            'class' => '12th Grade',
            'role' => 'student',
        ]);

        // Add more students as needed
    }
}
