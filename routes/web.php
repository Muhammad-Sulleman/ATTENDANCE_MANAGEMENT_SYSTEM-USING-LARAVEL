    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

    // Authentication Routes
    Route::get('/', function () {
        return view('layouts.app'); // Correctly reference the 'app.blade.php' file in the 'layouts' folder
    })->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Student Routes
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

// Teacher Routes
Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
Route::get('/teacher/createSession', [TeacherController::class, 'createSession'])->name('teacher.createSession');
Route::post('/teacher/createSession', [TeacherController::class, 'storeSession'])->name('teacher.storeSession'); // POST Route
Route::get('/teacher/markAttendance/{classid}', [TeacherController::class, 'markAttendance'])->name('teacher.markAttendance');
    Route::post('/teacher/markAttendance/{classid}', [TeacherController::class, 'storeAttendance'])->name('teacher.storeAttendance');// POST Route
