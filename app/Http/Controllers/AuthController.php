<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Classes;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        $classes = Classes::all();

        return view('auth.register', compact('classes'));
    }

    public function store(RegisterRequest $request)
    {
        $this->authService->register(
            $request->validated()
        );

        return redirect('/login')
            ->with('success', 'Registrasi berhasil');
    }

    public function authenticate(LoginRequest $request)
    {
        if (! $this->authService->login(
            $request->validated()
        )) {
            return back()->with(
                'error',
                'Email atau Password salah'
            );
        }

        $request->session()->regenerate();

        return redirect(
            $this->authService->getRedirectByRole(
                Auth::user()->role
            )
        );
    }

    public function logout(Request $request)
    {
        $this->authService->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
