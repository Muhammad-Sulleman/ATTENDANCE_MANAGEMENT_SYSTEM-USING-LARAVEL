<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;

class ClassSeeder extends Seeder
{
    public function run()
    {
        // Insert class data into the classes table
        ClassModel::create([
            'teacherid' => 1, // Assuming teacher with id 1 exists
            'starttime' => '09:00:00',
            'endtime' => '10:30:00',
            'credit_hours' => 3,
        ]);

        ClassModel::create([
            'teacherid' => 2, // Assuming teacher with id 2 exists
            'starttime' => '11:00:00',
            'endtime' => '12:30:00',
            'credit_hours' => 3,
        ]);

        // Add more classes as needed
    }
}
