<?php

namespace App\Repositories;

use App\Models\Classes;
use App\Repositories\Contracts\TeacherClassRepositoryInterface;

class TeacherClassRepository implements TeacherClassRepositoryInterface
{
    public function getAll()
    {
        return Classes::with('teachers.user')
            ->paginate(10);
    }
}