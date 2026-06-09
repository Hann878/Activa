<?php

namespace App\Services;

use App\Repositories\Contracts\TeacherClassRepositoryInterface;

class TeacherClassService
{
    public function __construct(
        private TeacherClassRepositoryInterface $repository
    ) {}

    public function getAll()
    {
        return $this->repository->getAll();
    }
}