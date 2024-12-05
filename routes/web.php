<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;

Route::get('/dashboard', [AttendanceController::class, 'index'])->name('dashboard');
Route::post('/attendance', [AttendanceController::class, 'markAttendance'])->name('attendance.mark');
