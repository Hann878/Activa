<?php

namespace App\Http\Controllers;

use App\Models\Attendances;

class TeacherAttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendances::with('student.user')
        ->latest()
        ->paginate(10);

        return view(
            'teacher.attendances',
            compact('attendances')
        );
    }
}