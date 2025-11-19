<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NTokoConntoller extends Controller
{
     public function index()
    {
        // $toko = Toko::orderBy('status', 'asc')->get();
        $toko = Toko::all();
        // $pendingToko = Toko::where('status', 'pending')->count();
        return view('toko.toko', compact('toko'));
    }

    public function create()
    {
        return view('admin.toko.toko-create');
    }

    // public function daftarToko()
    // {
    //     $toko = Toko::orderBy('status')->get();
    //     return view('admin.toko.toko', compact('toko'));
    // }

    public function approve($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->status = 'aktif';
        $toko->save();

        return back()->with('success', 'Toko berhasil diaktifkan!');
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

    if ($request->hasFile('gambar')) {
        $validated['gambar'] = $request->file('gambar')->store('toko', 'public');
    }

    $validated['id_user'] = Auth::id();
    // $validated['status'] = 'pending';

    // Simpan ke database
    Toko::create($validated);

    return redirect()->route('admin-toko')->with('success', 'Toko berhasil ditambahkan!');
    }
    public function edit(String $id)
    {
        $id = Crypt::decrypt($id);
        $toko = Toko::findOrFail($id);
        return view('toko.edit-toko', compact('toko'));
    }

    public function editA(String $id)
    {
        $id = Crypt::decrypt($id);
        $toko = Toko::findOrFail($id);
        return view('admin.toko.toko-edit', compact('toko'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'kontak_toko' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
        ]);
           if ($request->hasFile('gambar')) {
        $validated['gambar'] = $request->file('gambar')->store('toko', 'public');
    }

        $toko = Toko::findOrFail($id);
        $toko->update($request->all());

        return redirect()->route('toko')->with('success', 'Toko berhasil diperbarui!');
    }

    public function updateAdmin(Request $request, $id)
    {
    {
        try {
            $id = Crypt::decrypt($id);  // Dekripsi ID yang dikirim dalam URL
        } catch (\Exception $e) {
            return redirect()->route('admin-toko')->with('error', 'ID toko tidak valid.');
        }

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

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $toko = Toko::findOrFail($id);
        $toko->produk()->delete();
        $toko->delete();

        return redirect()->route('admin-toko')->with('success', 'Toko berhasil dihapus!');
    }

    public function buat(Request $request)
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

        $validated['id_user'] = Auth::id();
        // $validated['status'] = 'pending';

        Toko::create($validated);

        return redirect()->route('toko')->with('success', 'Toko berhasil dibuat!');
    }

    public function buka(Request $request)
    {
        return view('toko.buka-toko');
    }

    public function Dtoko($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        $toko = Toko::findOrFail($id);
        $toko->produk()->delete();
        $toko->delete();

        return redirect()->route('toko')->with('success', 'Toko berhasil dihapus!');
    }
}
