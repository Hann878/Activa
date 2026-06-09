<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TeacherClassService;

class TeacherClassController extends Controller
{
    public function __construct(
        private TeacherClassService $service
    ) {}

    public function index()
    {
        return view(
            'teacher.classes',
            [
                'classes' => $this->service->getAll()
            ]
        );
    }
}