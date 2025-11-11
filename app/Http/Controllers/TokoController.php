<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    //
     public function index()
    {
        $toko = Toko::all();
        return view('admin.toko', compact('toko'));
    }

    public function create()
    {
        return view('admin.toko-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);

        Toko::create($request->all());

        return redirect()->route('admin-toko')->with('success', 'Toko berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        return view('toko-edit', compact('toko'));
    }

    public function update(Request $request, $id)
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
}
