<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:users', 'email'],
            'password' => 'required',
            'name' => 'required',
            'hak_akses' => 'required'
        ]);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'hak_akses' => $request->hak_akses,
        ]);

        session()->flash('success', 'Selamat anda berhasil Registrasi User');

        return redirect('/');
    }
}
