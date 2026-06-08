<?php

namespace App\Repositories\Contracts;


interface StudentRepositoryInterface
{
    public function getLastStudent();

    public function create(array $data);
}