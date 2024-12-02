<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\http\Requests\RegisterRequest;
use GuzzleHttp\Promise\Create;
use League\Config\Exception\ValidationException;


class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.registrasi');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]*$/|min:3',
            'username' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);
    
        // Simpan ke database
        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Enkripsi password
        ]);
        
        return redirect()->route('login')->with('success', 'Registrasi Berhasil');
    }
    
}
