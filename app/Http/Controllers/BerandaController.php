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
        $data['kategori'] = Kategori::all();
        $data['produk'] = Produk::all();
        return view('beranda', $data);
    }

    public function wish()
    {
        return view('wish');
    }
}
