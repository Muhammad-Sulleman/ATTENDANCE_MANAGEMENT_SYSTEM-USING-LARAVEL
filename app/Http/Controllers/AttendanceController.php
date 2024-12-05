<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Attendance;





use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class AttendanceController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'teacher') {
            $classes = ClassModel::where('teacher_id', auth()->id())->get();
            return view('teacher.dashboard', compact('classes'));
        } elseif (auth()->user()->role == 'student') {
            $attendance = Attendance::where('student_id', auth()->id())->get();
            return view('student.dashboard', compact('attendance'));
        }
    }

    public function markAttendance(Request $request)
    {
        Attendance::updateOrCreate(
            ['class_id' => $request->class_id, 'student_id' => $request->student_id],
            ['is_present' => $request->is_present, 'comments' => $request->comments]
        );

        return back()->with('success', 'Attendance updated successfully.');
    }
}
