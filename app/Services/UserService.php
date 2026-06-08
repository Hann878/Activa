<?php

namespace App\Services;

use App\Models\User;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
        ]);

        if ($data['role'] === 'siswa') {
            $lastStudent = Students::latest()->first();

            $lastNumber = $lastStudent ? (int) substr($lastStudent->nis, -3) : 0;

            $newNis = '2026' . str_pad(
                $lastNumber + 1, 3, '0', STR_PAD_LEFT
            );

            Students::create([
                'user_id' => $user->id,
                'nis' => $newNis,
                'class_id' => $data['class_id']
            ]);
        }

        return $user;
    }

    public function update(User $user, array $data)
    {
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role']
        ]);
        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}