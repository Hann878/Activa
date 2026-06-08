<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tes', function(){
    return view('admin.add-user');
});
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

    Route::get('/admin/classes', [ClassesController::class, 'index']);

    Route::get('/admin/students', [StudentsController::class, 'index']);
    Route::put('/admin/students/{student}', [StudentsController::class, 'update']);

    Route::get('/admin/teachers', [TeacherController::class, 'index']);
    Route::put('/admin/teachers/{teacher}', [TeacherController::class, 'update']);
    Route::delete('/admin/teachers/{teacher}', [TeacherController::class, 'destroy']);

});

//role guru
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    });

});

//role siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('student.dashboard');
    });

});