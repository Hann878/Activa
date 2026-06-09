<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TeacherStudentService;

class TeacherStudentController extends Controller
{
    public function __construct(
        private TeacherStudentService $service
    ) {}

    public function index()
    {
        return view(
            'teacher.students',
            [
                'students' => $this->service->getAllStudents()
            ]
        );
    }
}