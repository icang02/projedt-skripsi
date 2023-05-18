<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('main.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'id' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'id' => 'The provided credentials do not match our records.',
        ])->onlyInput('id');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Register
    public function register()
    {
        return view('main.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'nim' => 'unique:users,id',
            'email' => 'unique:users,email',
        ]);

        User::create([
            'id' => strtoupper($request->nim),
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'mahasiswa',
        ]);
        return redirect('/login')->with('success', 'Akun berhasil dibuat. Silahkan login.');
    }
}
