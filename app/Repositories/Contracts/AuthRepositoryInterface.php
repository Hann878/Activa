<?php

namespace App\Repositories\Contracts;


interface AuthRepositoryInterface
{
    public function login(array $credentials);

    public function register(array $data);

    public function logout();

    public function getLastStudent();
}