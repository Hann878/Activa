<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Teacher;
use App\Repositories\Contracts\TeacherRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class TeacherRepository
implements TeacherRepositoryInterface
{
    public function getAll()
    {
        return Teacher::with('user')
            ->paginate(10);
    }

    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'role' => 'guru'
        ]);

        return Teacher::create([
        'user_id' => $data['user_id'],
        'nip' => $data['nip'],
        'subject' => $data['subject'],
        'address' => $data['address'],
    ]);
    }

    public function update(
        int $id,
        array $data
    ) {
        $teacher = Teacher::findOrFail($id);

        $teacher->user->update([
            'name' => $data['name'],
            'email' => $data['email']
        ]);

        $teacher->update([
            'nip' => $data['nip'],
            'subject' => $data['subject'],
            'address' => $data['address']
        ]);

        return $teacher;
    }

    public function delete(int $id)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->user()->delete();

        return $teacher->delete();
    }
}