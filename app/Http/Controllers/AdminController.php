<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dash()
    {
        return view('admin.dashboard');
    }

    public function produk()
    {
        $data ['produk'] = Produk::all();
        $data ['kategori'] = Kategori::all();

        return view('admin.produk', $data);
    }

    public function kategori()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', compact('kategori'));
    }

    public function toko()
    {
        return view('admin.toko');
    }
}
