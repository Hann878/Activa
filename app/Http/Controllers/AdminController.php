<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = \App\Models\User::count();
        $totalStudents = \App\Models\Students::count();
        $totalClasses = \App\Models\Classes::count();
        $totalTeachers = \App\Models\Teacher::count();

        return view('admin.dashboard', compact('totalUsers', 'totalStudents', 'totalClasses', 'totalTeachers'));
    }

    public function students()
    {
        $students = \App\Models\Students::with(['user', 'class'])->get();
        $classes = \App\Models\Classes::all();

        return view('admin.students', compact('students', 'classes'));
    }

    public function classes()
    {
        $classes = Classes::paginate(10);
        return view('admin.classes', compact('classes'));
    }

}
