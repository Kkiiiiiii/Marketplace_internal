<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use PhpParser\Node\Scalar\String_;

class TokoController extends Controller
{
    //
     public function index()
    {
        $toko = Toko::all();
        return view('toko', compact('toko'));
    }

    public function create()
    {
        return view('admin.toko-create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_toko' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'kontak_toko' => 'required|string|max:50',
        'alamat' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Upload gambar ke storage/app/public/toko
    if ($request->hasFile('gambar')) {
        $validated['gambar'] = $request->file('gambar')->store('toko', 'public');
    }

    //  $validated['id_user'] = auth()->user()->id_user;
    $validated['id_user'] = Auth::id();

    // Simpan ke database
    Toko::create($validated);

    return redirect()->route('admin-toko')->with('success', 'Toko berhasil ditambahkan!');
}



    public function edit(String $id)
    {
        $toko = Toko::findOrFail($id);
        return view('admin.', compact('toko'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'kontak_toko' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        $toko = Toko::findOrFail($id);
        $toko->update($request->all());

        return redirect()->route('admin-toko')->with('success', 'Toko berhasil diperbarui!');
    }

    public function delete($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }

}
