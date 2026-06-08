<?php

namespace App\Services;

use App\Models\User;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role']
            ]);

            if ($data['role'] === 'siswa') {
                $lastStudent = Students::orderBy('id', 'desc')->first();

                $lastNumber = $lastStudent ? (int) substr($lastStudent->nis, -3) : 0;

                $newNis = '2026' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

                Students::create([
                    'user_id' => $user->id,
                    'nis' => $newNis,
                    'class_id' => $data['class_id']
                ]);
            }

            if ($data['role'] === 'guru') {

                Teacher::create([
                    'user_id' => $user->id,
                    'nip' => $data['nip'],
                    'subject' => $data['subject'],
                    'address' => $data['address']
                ]);
            }

            return $user;
        });
    }

    public function update(User $user, array $data)
    {
        return DB::transaction(function () use ($user, $data) {
            $updateData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role']
            ];

            if (!empty($data['password'])) {
                $updateData['password'] = Hash::make($data['password']);
            }

            $user->update($updateData);

            // If role switched to siswa, ensure teacher record removed and student created/updated
            if ($data['role'] === 'siswa') {
                Teacher::where('user_id', $user->id)->delete();

                $student = Students::where('user_id', $user->id)->first();
                if ($student) {
                    $student->update([
                        'class_id' => $data['class_id'] ?? $student->class_id
                    ]);
                } else {
                    $lastStudent = Students::orderBy('id', 'desc')->first();
                    $lastNumber = $lastStudent ? (int) substr($lastStudent->nis, -3) : 0;
                    $newNis = '2026' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

                    Students::create([
                        'user_id' => $user->id,
                        'nis' => $newNis,
                        'class_id' => $data['class_id'] ?? null
                    ]);
                }
            }

            // If role switched to guru, ensure student record removed and teacher created/updated
            if ($data['role'] === 'guru') {
                Students::where('user_id', $user->id)->delete();

                Teacher::updateOrCreate([
                    'user_id' => $user->id
                ], [
                    'user_id' => $user->id,
                    'nip' => $data['nip'] ?? null,
                    'subject' => $data['subject'] ?? null,
                    'address' => $data['address'] ?? null
                ]);
            }

            return $user;
        });
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}