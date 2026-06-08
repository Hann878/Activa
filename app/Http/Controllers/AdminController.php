<?php

namespace App\Http\Controllers;

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

}
