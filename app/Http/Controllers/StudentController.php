<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;  // Ensure the Attendance model is imported
use App\Models\ClassModel;
use App\Models\User;  // Ensure the Attendance model is imported

class StudentController extends Controller
{
    public function dashboard()
    {
        // Check if the user is a teacher
        if (auth()->user()->role !== 'student') {
            abort(403, 'Unauthorized action.');
        }

        $teacherId = auth()->user()->id;
        $user= auth()->user();
        $classes = ClassModel::where('teacherid', $teacherId)->get();



        $attendanceRecords = ClassModel::withCount(['attendance as attended' => function ($query) use ($user) {
            $query->where('studentid', $user->id);
        }])
            ->get()
            ->map(function ($class) use ($user) {
                return (object)[
                    'classid' => $class->id,
                    'total_sessions' => $class->attendance->count(), // Total number of attendance sessions
                    'attended' => $class->attendance->where('studentid', $user->id)->count(),
                    'attendance_percentage' => $class->attendance->count()
                        ? round(($class->attendance->where('studentid', $user->id)->count() / $class->attendance->count()) * 100, 2)
                        : 0,
                ];
            });

        return view('student.dashboard', ['attendanceRecords' => $attendanceRecords]);
    }
}
    // Add other student-specific actions if needed

