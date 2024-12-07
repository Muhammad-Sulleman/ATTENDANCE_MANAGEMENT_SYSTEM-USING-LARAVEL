<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        // Assuming classid 1 and studentid 1 exist
        Attendance::create([
            'classid' => 1,
            'studentid' => 1, // Ali Khan
            'isPresent' => true,
            'comments' => 'On time',
        ]);

        Attendance::create([
            'classid' => 1,
            'studentid' => 2, // Fatima Ahmed
            'isPresent' => false,
            'comments' => 'Absent due to illness',
        ]);

     
        // Add more attendance records as needed
    }
}
