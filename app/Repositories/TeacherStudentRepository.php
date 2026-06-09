<?php

namespace App\Repositories;

use App\Models\Students;
use App\Repositories\Contracts\TeacherStudentRepositoryInterface;

class TeacherStudentRepository implements TeacherStudentRepositoryInterface
{
    public function getAll()
    {
        return Students::with([
            'user',
            'class'
        ])->paginate(10);
    }
}