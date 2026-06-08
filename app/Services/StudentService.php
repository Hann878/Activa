<?php

namespace App\Services;

use App\Repositories\Contracts\StudentRepositoryInterface;

class StudentService
{
    public function __construct(
        private StudentRepositoryInterface $studentRepository
    ) {}

    public function generateNis(): string
    {
        $lastStudent = $this->studentRepository->getLastStudent();

        $lastNumber = $lastStudent
            ? (int) substr($lastStudent->nis, -3)
            : 0;

        return date('Y') .
            str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    }

    public function createStudent(array $data)
    {
        $data['nis'] = $this->generateNis();

        return $this->studentRepository->create($data);
    }
}