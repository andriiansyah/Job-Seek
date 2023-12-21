<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        // if(Auth::user() !== null) {
        //     return redirect()->route('job');
        // }
        return response()->view('login.login')->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($data)) {
            return redirect()->route('job')->with('success', 'Selamat anda berhasil Login!');
        }

        // $user = User::whereEmail($request->email)->first();
        // if($user) {
        //     if(Hash::check($request->password, $user->password)) {
        //         // dd($user);
        //         // if($user->role == 1) {
        //         //     dd("session admin");
        //         // } else if($user->role == 2) {
        //         //     dd("session user");
        //         // }
        //         return redirect('/dashboard')->with('success', 'Selamat anda berhasil Login!');
        //     }
        // }

        throw ValidationValidationException::withMessages([
            'email' => 'Email atau password salah',
        ]);
    }
}
