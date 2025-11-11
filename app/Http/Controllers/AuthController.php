<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function indexLog()
    {
        return view('login');
    }
    public function login(Request $request)
    {
          $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek login menggunakan Auth
        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard atau halaman yang sesuai
            return redirect()->route('beranda');
        }

        // Jika gagal login
        return redirect()->route('indexLog')->with('error', 'Username atau Password salah.');
    }
    public function register(Request $request)
    {
    $request->validate([
        'nama' => 'required',
        'kontak' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
    ]);

    $user = User::create([
        'nama' => $request->nama,
        'kontak' => $request->kontak,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'member',
    ]);

    return redirect()->route('indexLog');
    }

    public function regis()
    {
        return view('register');
    }

}
