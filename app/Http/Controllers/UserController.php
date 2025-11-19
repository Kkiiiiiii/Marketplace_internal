<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('admin.user.user-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|confirmed|max:6',
            'role' => 'required|in:admin,member',
        ]);

        User::create([
            'name' => $request->name,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin-user')->with('success', 'User berhasil ditambahkan!');
    }


    public function edit(String $id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
        return view('admin.user.user-edit', compact('user'));
    }


   public function update(Request $request, $id)
{
    $id = Crypt::decrypt($id);
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'kontak' => 'required|string|max:20',
        'username' => 'required|unique:users,username,' . $user->id_user . ',id_user',
        'password' => 'nullable|confirmed|max:6',
    ]);

    $user->name = $request->name;
    $user->kontak = $request->kontak;
    $user->username = $request->username;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('admin-user')
                     ->with('success', 'User berhasil diperbarui!');
}




    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
         if ($user->toko) {
        // Hapus semua produk toko
        $user->toko->produk()->each(function ($produk) {
            foreach ($produk->gambarProduk as $gambar) {
                if (Storage::exists($gambar->nama_gambar)) {
                    Storage::delete($gambar->nama_gambar);
                }
                $gambar->delete();
            }
            $produk->delete();
        });

        $user->toko()->delete();
    }

    $user->delete();

        return redirect()->route('admin-user')->with('success', 'User berhasil dihapus!');
    }
}
