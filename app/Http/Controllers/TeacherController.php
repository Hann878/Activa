<?php

namespace App\Http\Controllers;

use App\Models\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $teachers = teacher::with('user')->get();
        return view('admin.teachers', compact('teachers'));
    }
}
