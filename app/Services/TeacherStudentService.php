<?php

namespace App\Services;

use App\Repositories\Contracts\TeacherStudentRepositoryInterface;

class TeacherStudentService
{
    public function __construct(
        private TeacherStudentRepositoryInterface $repository
    ) {}

    public function getAllStudents()
    {
        return $this->repository->getAll();
    }
}