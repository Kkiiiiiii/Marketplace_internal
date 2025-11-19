<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Type\Decimal;

class ProdukController extends Controller
{
    //
    public function index(Request $request)
    {
        $produkQuery = Produk::with(['gambarProduk', 'toko']);

        // Filter kategori jika ada
       if ($request->kategori) {
            try {
                $id_kategori = Crypt::decrypt($request->kategori);
                $produkQuery->where('id_kategori', $id_kategori);
            } catch (Exception $e) {
                abort(400, 'Kategori tidak valid');
            }
        }

        // Ambil hasil query
        $produk = $produkQuery->get();

        // Ambil semua kategori
        $kategori = Kategori::all();

        return view('produk.produk', compact('produk', 'kategori'));
    }

    public function produkByToko($id)
{
    $id = Crypt::decrypt($id);
    // Ambil toko berdasarkan ID
    $toko = Toko::findOrFail($id);
    // Ambil semua produk dari toko ini
    $produk = Produk::where('id_toko', $id)->with('kategori', 'toko', 'gambarProduk')->get();

    return view('toko.produk-toko', compact('produk', 'toko'));
}


    public function detail($id)
    {
        $id = Crypt::decrypt($id);
        $produk = Produk::with('gambarProduk')->findOrFail($id);
        return view('produk.detail-produk', compact('produk'));
    }

     public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.produk.produk-create',  $data);
    }
     public function bproduk()
    {
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('produk.buat-produk', $data);
    }

    public function sproduk(Request $request)
    {
         $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'id_toko' => 'required|exists:toko,id_toko',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'deskripsi' => 'nullable|string',
        'gambar_produk.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Tambahkan tanggal upload
    $validated['tanggal_upload'] = now();

    $produk = Produk::create($validated);

    if ($request->hasFile('gambar_produk')) {
        foreach ($request->file('gambar_produk') as $gambar) {
            $namaFile = $gambar->store('gambar_produk', 'public');

            Gambar::create([
                'id_produk' => $produk->id_produk,
                'nama_gambar' => $namaFile,
            ]);
        }
    }

    return redirect()->route('produk')
        ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $data['produk'] = Produk::findOrFail(id: $id);
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.produk.produk-edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_toko' => 'required|exists:toko,id_toko',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar_produk.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($validated);

        if ($request->hasFile('gambar_produk')) {
            // Hapus gambar lama jika ada
            foreach ($produk->gambarProduk as $gambar) {
                // Hapus file fisik
                Storage::disk('public')->delete($gambar->nama_gambar);
                // Hapus data di database
                $gambar->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('gambar_produk') as $gambar) {
                $namaFile = $gambar->store('gambar_produk', 'public');

                Gambar::create([
                    'id_produk' => $produk->id_produk,
                    'nama_gambar' => $namaFile,
                ]);
            }
        }

        return redirect()->route('admin-produk')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function delete($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar terkait
        foreach ($produk->gambarProduk as $gambar) {
            // Hapus file fisik
            Storage::disk('public')->delete($gambar->nama_gambar);
            // Hapus data di database
            $gambar->delete();
        }
        $produk->delete();

        return redirect()->route('admin-produk')
            ->with('success', 'Produk berhasil dihapus!');
    }

     public function proEdit($id)
    {
        $id = Crypt::decrypt($id);
        $data['produk'] = Produk::findOrFail(id: $id);
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('produk.edit-produk', $data);
    }

    public function pUpdate(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_toko' => 'required|exists:toko,id_toko',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar_produk.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($validasi);

        if ($request->hasFile('gambar_produk')) {
            foreach ($produk->gambarProduk as $gambar) {
                Storage::disk('public')->delete($gambar->nama_gambar);
                // Hapus data di database
                $gambar->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('gambar_produk') as $gambar) {
                $namaFile = $gambar->store('gambar_produk', 'public');

                Gambar::create([
                    'id_produk' => $produk->id_produk,
                    'nama_gambar' => $namaFile,
                ]);
            }
        }

        return redirect()->back()
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function pDelete($id)
    {
        $id = Crypt::decrypt($id);
        $produk = Produk::findOrFail($id);
        // Hapus gambar terkait
        foreach ($produk->gambarProduk as $gambar) {
            Storage::disk('public')->delete($gambar->nama_gambar);
            // Hapus data di database
            $gambar->delete();
        }
        $produk->delete();

        return redirect()->back()
            ->with('success', 'Produk berhasil dihapus!');
    }
}
