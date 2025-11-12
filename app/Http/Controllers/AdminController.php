<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dash()
    {
        $data['produk'] = Produk::all();
        $data['kategori'] = Kategori::all();
        $data['toko'] = Toko::all();
        return view('admin.dashboard', $data);
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
        $toko = Toko::all();
        return view('admin.toko', compact('toko'));
    }

    public function user()
    {
        $user = User::all();
        return view('admin.User.user', compact('user'));
    }
}
