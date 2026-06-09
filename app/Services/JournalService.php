<?php

namespace App\Services;

use App\Models\Students;
use App\Repositories\Contracts\JournalRepositoryInterface;

class JournalService
{
    public function __construct(
        private JournalRepositoryInterface $journalRepository
    ) {}

    public function getStudentJournal()
    {
        $student = Students::where(
            'user_id',
            auth()->id()
        )->first();

        return [
            'student' => $student,
            'journals' => $this->journalRepository
                ->getByStudent($student->id)
        ];
    }

    public function createJournal(array $data)
    {
        $student = Students::where(
            'user_id',
            auth()->id()
        )->first();

        $data['student_id'] = $student->id;

        return $this->journalRepository
            ->create($data);
    }
}