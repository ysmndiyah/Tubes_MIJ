<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //public function showRegisterForm()
    //{
        //return view('auth.register');
    //}

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'admin', // atau 'admin'
    ]);

    auth()->login($user);

    // ⬇️ Ini letakkan di sini
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
}


public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Hanya izinkan admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            // Logout dan tolak akses
            Auth::logout();
            return back()->withErrors([
                'email' => 'Hanya admin yang diperbolehkan login.',
            ]);
        }
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Berhasil logout.');
}

}
