<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TeacherDashboardService;

class TeacherDashboardController extends Controller
{
    public function __construct(
        private TeacherDashboardService $dashboardService
    ) {}

    public function index()
    {
        $data = $this->dashboardService
            ->getDashboardData();

        return view(
            'teacher.dashboard',
            $data
        );
    }
}