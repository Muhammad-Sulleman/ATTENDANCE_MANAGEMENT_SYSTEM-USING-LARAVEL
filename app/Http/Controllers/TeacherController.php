<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel; // Class model
use App\Models\Attendance; // Attendance model
use App\Models\User;       // User model
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    // Teacher Dashboard
    public function dashboard()
    {
        // Ensure the user is a teacher
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Unauthorized action.');
        }

        $teacherId = auth()->user()->id;

        // Fetch classes taught by the teacher
        $classes = ClassModel::where('teacherid', $teacherId)->get();

        return view('teacher.dashboard', compact('classes', 'teacherId'));
    }

    // Show Create Session Form
    public function createSession()
    {
        // Ensure the user is a teacher
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Unauthorized action.');
        }

        return view('teacher.create-session');
    }

    // Handle Session Creation
    public function storeSession(Request $request)
    {
        // Validate request
        $request->validate([
            'starttime' => 'required|date_format:H:i',
            'endtime' => 'required|date_format:H:i|after:starttime',
            'credit_hours' => 'required|integer|min:1',
        ]);

        // Create the session
        ClassModel::create([
            'teacherid' => auth()->user()->id,
            'class_name' => $request->starttime . ' - ' . $request->endtime,
            'starttime' => $request->starttime,
            'endtime' => $request->endtime,
            'credit_hours' => $request->credit_hours,
        ]);

        // Redirect back with a success flag
        return redirect()->route('teacher.createSessionView')
        ->with('success', 'Class session created successfully!');
    }


    // Mark Attendance Form
    public function markAttendance($classid = null)
    {
        // Ensure the user is a teacher
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Unauthorized action.');
        }

        // Check if $classid is valid
        if (is_null($classid) || !ClassModel::find($classid)) {
            return redirect()->route('teacher.dashboard')->with('error', 'Invalid or missing class ID.');
        }

        // Fetch students associated with the class
        $students = User::where('class', $classid)->get();

        // Pass $classid and $students to the view
        return view('teacher.mark-attendance', compact('classid', 'students'));
    }

    // Store Attendancer
    public function storeAttendance(Request $request)
    {
        // Capture only selected attendance IDs from the form
        $studentIds = $request->input('attendance', []);

        // Loop through the submitted IDs and insert them into the database
        foreach ($studentIds as $studentId) {
            Attendance::updateOrCreate(
                [
                    'classid' => $request->classid,
                    'studentid' => $studentId,
                ],
                [
                    'isPresent' => 1,
                    'comments' => null,
                    'marked_by' => auth()->user()->id,
                ]
            );
        }

        // Redirect with success
        return redirect()->route('teacher.dashboard')->with('success', 'Attendance marked successfully!');
    }



}
