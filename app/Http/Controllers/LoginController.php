<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
     // Validasi input
     $credentials = $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required|min:8',
    ]);

    // Coba login menggunakan credentials
    if (Auth::attempt($credentials)) {
        // Jika login berhasil
        $request->session()->regenerate();
        return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
    }

    // Jika login gagal
    return back()->with('error', 'Email atau password salah.');
}
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
