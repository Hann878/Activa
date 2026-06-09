<?php

namespace App\Repositories;

use App\Models\Journals;
use App\Repositories\Contracts\JournalRepositoryInterface;

class JournalRepository implements JournalRepositoryInterface
{
    public function getByStudent(int $studentId)
    {
        return Journals::where(
            'student_id',
            $studentId
        )
        ->latest()
        ->get();
    }

    public function create(array $data)
    {
        return Journals::create($data);
    }
}