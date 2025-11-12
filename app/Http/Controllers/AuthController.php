<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class AuthController extends Controller
{
    //
    public function indexLog()
    {
        return view('login');
    }
    public function login(Request $request)
    {
          $validasi = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek login menggunakan Auth
        if (Auth::attempt($validasi)) {
            // Redirect ke dashboard atau halaman yang sesuai
            return redirect()->route('beranda');
        }

        // Jika gagal login
        return redirect()->route('indexLog')->with('error', 'Username atau Password salah.');
    }
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'kontak' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'kontak' => $request->kontak,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'member',
    ]);

    Auth::login($user);

    return redirect()->route('indexLog');
    }

    public function regis()
    {
        return view('register');
    }

    //Halaman Login Admin//

    public function AdminLog()
    {
        return view('admin.auth.login');
    }

    public function Alogin(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek login menggunakan Auth
        if (Auth::attempt($validasi)) {
            // Redirect ke dashboard atau halaman yang sesuai
            return redirect()->route('dashboard');
        }

        // Jika gagal login
        return redirect()->route('AdminLog')->with('error', 'Username atau Password salah.');
    }

     public function logout(){
        Auth::logout();
        return redirect()->route('indexLog')->with('messages','Logout Berhasil');
    }

    public function Alogout()
    {
        Auth::logout();
        return redirect()->route('AdminLog')->with('messages', 'Logout Berhasil');
    }

}
