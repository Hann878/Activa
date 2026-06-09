<?php

namespace App\Repositories\Contracts;

interface JournalRepositoryInterface
{
    public function getByStudent(int $studentId);

    public function create(array $data);
}