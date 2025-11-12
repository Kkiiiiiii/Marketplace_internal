<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    //
    public function index(Request $request)
    {
        $toko = Produk::with('toko')->get();

        // Ambil semua kategori
        $kategori = Kategori::all();

        // Query produk
        $produkQuery = Produk::query();

        // Filter berdasarkan kategori jika ada request
        if ($request->has('kategori')) {
            $produkQuery->where('id_kategori', $request->kategori);
        }

        // Ambil hasil query
        $produk = $produkQuery->with('gambarProduk')->get();

        // Kirim ke view
        return view('produk', compact('produk', 'toko', 'kategori'));
    }

    public function detail()
    {
        return view('detail-produk');
    }

     public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.produk-create',  $data);
    }

    public function store(Request $request)
{

    // dd($request->all());
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'deskripsi' => 'nullable|string',
        'gambar_produk.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // multiple images
    ]);


    $data = $request->all();
    $data['tanggal_upload'] = now();

    // Jika produk terkait dengan toko user login
    $data['id_toko'] = optional(Auth::user()->toko)->id ?? 1;
    // $data['id_toko'] = 1;

    // 4️⃣ Simpan produk
    $produk = Produk::create($data);

    // 5️⃣ Simpan gambar jika ada
    if ($request->hasFile('gambar_produk')) {
        foreach ($request->file('gambar_produk') as $gambar) {
            $gambarProduk = new Gambar();
            $gambarProduk->id_produk = $produk->id;
            $gambarProduk->nama_gambar = $gambar->store('gambar_produk', 'public'); // simpan di storage/app/public/gambar_produk
            $gambarProduk->save();
        }
    }

    return redirect()->route('admin-produk')->with('success', 'Produk berhasil ditambahkan!');
}


    // public function store(Request $request)
    // {
    //     $produk = Produk::create($request->all());
    //     if ($request->hasFile('gambar_produk')) {
    //         foreach ($request->file('gambar_produk') as $gambar) {
    //             $gambarProduk = new Gambar();
    //             $gambarProduk->id_produk = $produk->id;
    //             $gambarProduk->nama_gambar = $gambar->store('gambar_produk');
    //             $gambarProduk->save();
    //         }
    //     }
    //     return redirect()->route('produk')->with('success', 'Produk berhasil Ditambah');
    // }


}
