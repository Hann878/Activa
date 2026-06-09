<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherAttendanceController;
use App\Http\Controllers\TeacherClassController;
use App\Http\Controllers\TeacherStudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\TeacherJournalController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/tes', function(){
//     return view('admin.add-user');
// });
//Autentikasi Routes
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//role routes
//role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    Route::get('/admin/users', [UserController::class, 'index']);
    Route::get('/admin/add-user', [UserController::class, 'create']);
    Route::post('/admin/add-user', [UserController::class, 'store']);
    Route::put('/admin/users/{user}', [UserController::class, 'update']);
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy']);

    Route::get('/admin/classes', [AdminController::class, 'classes']);
    Route::get('/admin/classes/add-class', [ClassesController::class, 'create']);
    Route::post('/admin/classes/add-class', [ClassesController::class, 'store']);
    Route::put('/admin/classes/{class}', [ClassesController::class, 'update']);
    Route::delete('/admin/classes/{class}', [ClassesController::class, 'destroy']);

    Route::get('/admin/students', [AdminController::class, 'students']);
    Route::put('/admin/students/{student}', [StudentsController::class, 'update']);

    Route::get('/admin/teachers', [TeacherController::class, 'index']);
    Route::put('/admin/teachers/{teacher}', [TeacherController::class, 'update']);
    Route::delete('/admin/teachers/{teacher}', [TeacherController::class, 'destroy']);

});

//role guru
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');

    Route::get('/guru/classes', [TeacherClassController::class, 'index'])->name('teacher.classes');

    Route::get('/guru/students', [TeacherStudentController::class, 'index'])->name('teacher.students');

    Route::get('/guru/attendances', [TeacherAttendanceController::class, 'index'])->name('teacher.attendance');
    Route::get('/guru/journals', [TeacherJournalController::class, 'index'])->name('teacher.journals');

});

//role siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [StudentsController::class, 'index']);

    Route::get('/siswa/classes', [ClassesController::class, 'index']);

    Route::get('/siswa/attendance',[AttendanceController::class, 'index'])->name('student.attendance');
    Route::post('/siswa/attendance/check-in',[AttendanceController::class, 'checkIn'])->name('student.attendance.checkin'); 
    Route::post('/siswa/attendance/check-out',[AttendanceController::class, 'checkOut'])->name('student.attendance.checkout');

    Route::get('/siswa/journal',[JournalController::class, 'index'])->name('student.journal');
    Route::post('/siswa/journal',[JournalController::class, 'store'])->name('student.journal.store');
});