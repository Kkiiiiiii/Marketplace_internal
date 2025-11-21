<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Wishlist;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $data['kategori'] = Kategori::with('produk')->get();
        $data['produk'] = Produk::orderBy('id_produk', 'desc')->take(8)->get();
        return view('beranda', $data);
    }

    public function wish()
    {
        $wishlist = Wishlist::with('produk.gambarProduk', 'produk.kategori') // preload relasi
            ->where('id_user', Auth::id())
            ->get();

        return view('wish', compact('wishlist'));
    }

    public function addWishlist($id_produk)
    {
        $userId = Auth::id();

        // Cek apakah sudah ada di wishlist
        $existing = Wishlist::where('id_user', $userId)->where('id_produk', $id_produk)->first();

        if ($existing) {
            // Jika sudah ada, hapus (toggle)
            $existing->delete();
            return redirect()->route('wish')->with('success', 'Produk dihapus dari wishlist.');
        }

        // Jika belum ada, tambah wishlist baru
        Wishlist::create([
            'id_user' => $userId,
            'id_produk' => $id_produk,
        ]);

        return redirect()->route('wish')->with('success', 'Produk ditambahkan ke wishlist.');
    }

    public function hapus($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return redirect()->route('wish')->with('error', 'ID tidak valid.');
        }

        $wishlist = Wishlist::where('id', $id)->where('id_user', Auth::id())->firstOrFail();

        $wishlist->delete();

        return redirect()->route('wish')->with('success', 'Produk berhasil dihapus dari wishlist');
    }
}
