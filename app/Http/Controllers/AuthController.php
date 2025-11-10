<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function indexLog()
    {
        return view('login');
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

}
