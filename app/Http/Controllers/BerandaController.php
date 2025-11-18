<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $data['kategori'] = Kategori::with('produk')->get();
        $data['produk'] = Produk::orderBy('id_produk','desc')->take(8)->get();
        return view('beranda', $data);
    }

    public function wish()
    {
        return view('wish');
    }
}
