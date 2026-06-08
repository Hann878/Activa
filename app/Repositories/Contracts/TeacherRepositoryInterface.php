<?php

namespace App\Repositories\Contracts;


interface TeacherRepositoryInterface
{
    public function create(array $data);

    public function getAll();

    public function update(
        int $id,
        array $data
    );

    public function delete(int $id);
}