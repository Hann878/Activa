<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Classes;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService
    ) {}

    public function index()
    {
        $users = User::latest()->paginate(10);
        $classes = Classes::all();

        return view('admin.users', compact('users', 'classes'));
    }

    public function create()
    {
        $classes = Classes::all();
        return view('admin.add-user', compact('classes'));
    }

    public function store(UserRequest $request)
    {
       $this->userService->create($request->validated());
       return redirect('/admin/users')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userService->update($user, $request->validated());
        return redirect('/admin/users')->with('success', 'User berhasil diupdate.');
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return redirect('/admin/users')->with('success', 'User berhasil dihapus.');
    }
}
