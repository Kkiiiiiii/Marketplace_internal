<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('admin.User.user-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|confirmed|min:6',
        ]);

       User::create([
            'name' => $request->name,
            'kontak' => $request->kontak,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'member',
        ]);


        return redirect()->route('admin-user')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
        return view('admin.User.user-edit', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'kontak' => 'required|string|max:20',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->name = $request->name;
        $user->kontak = $request->kontak;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('admin-user')->with('success', 'User berhasil diperbarui!');
    }


    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin-user')->with('success', 'User berhasil dihapus!');
    }
}
