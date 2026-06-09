<?php

namespace App\Repositories;

use App\Models\Journal;
use App\Models\Journals;
use App\Models\Student;
use App\Models\Students;
use App\Repositories\Contracts\TeacherDashboardRepositoryInterface;

class TeacherDashboardRepository implements TeacherDashboardRepositoryInterface
{
    public function getDashboardStatistics(): array
    {
        return [
            'totalStudents' => Students::count(),

            'todayJournals' => Journals::whereDate(
                'created_at',
                today()
            )->count(),

            'totalJournals' => Journals::count(),

            'pendingJournals' => Journals::where(
                'status',
                'pending'
            )->count(),
        ];
    }
}