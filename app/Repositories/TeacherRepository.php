<?php

namespace App\Repositories;

use App\Repositories\Contracts\TeacherRepositoryInterface;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'role' => 'guru'
        ]);

        return Teacher::create([
            'user_id' => $user->id,
            'nip' => $data['nip']
        ]);
    }
}