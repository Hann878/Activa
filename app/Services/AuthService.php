<?php

namespace App\Services;

use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(
        private AuthRepositoryInterface $authRepository
    ) {}

    public function login(array $credentials): bool
    {
        return $this->authRepository->login($credentials);
    }

    public function register(array $data)
    {
        $data['nis'] = $this->generateNis();

        return $this->authRepository->register($data);
    }

    public function logout(): void
    {
        $this->authRepository->logout();
    }

    public function generateNis(): string
    {
        $lastStudent = $this->authRepository->getLastStudent();

        $lastNumber = $lastStudent
            ? (int) substr($lastStudent->nis, -3)
            : 0;

        return date('Y')
            . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    }

    public function getRedirectByRole(string $role): string
    {
        return match ($role) {
            'admin' => '/admin/dashboard',
            'guru' => '/guru/dashboard',
            default => '/siswa/dashboard',
        };
    }
}