<?php

namespace App\Services;

use App\Repositories\Contracts\TeacherRepositoryInterface;

class TeacherService
{
    public function __construct(
        private TeacherRepositoryInterface $teacherRepository
    ) {}

    public function getAll()
    {
        return $this->teacherRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->teacherRepository->create($data);
    }

    public function update(
        int $id,
        array $data
    ) {
        return $this->teacherRepository->update(
            $id,
            $data
        );
    }

    public function delete(int $id)
    {
        return $this->teacherRepository->delete($id);
    }
}