<?php

namespace App\Repositories;

use App\Models\Students;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'siswa'
        ]);

        return Students::create([
            'user_id' => $user->id,
            'nis' => $data['nis'],
            'class_id' => $data['class_id']
        ]);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function getLastStudent()
    {
        return Students::latest()->first();
    }
}