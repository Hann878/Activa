<?php

namespace App\Services;

use App\Repositories\Contracts\TeacherDashboardRepositoryInterface;

class TeacherDashboardService
{
    public function __construct(
        private TeacherDashboardRepositoryInterface $dashboardRepository
    ) {}

    public function getDashboardData(): array
    {
        return $this->dashboardRepository
            ->getDashboardStatistics();
    }
}