<?php

namespace App\Repositories\Contracts;

interface TeacherDashboardRepositoryInterface
{
    public function getDashboardStatistics(): array;
}