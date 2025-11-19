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
        $data['user'] = User::all();

        $data['tokoPendingList'] = Toko::where('status', 'pending')->get();
        // Hitung jumlah toko pending
        $data['pendingToko'] = $data['tokoPendingList']->count();
        return view('admin.dashboard', $data);
    }

    public function approveToko($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->status = 'disetujui';
        $toko->save();

        return redirect()->back()->with('success', 'Toko berhasil disetujui!');
    }

    public function rejectToko($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->status = 'ditolak';
        $toko->save();

        return redirect()->back()->with('success', 'Toko berhasil ditolak!');
    }

    public function produk()
    {
        $data ['produk'] = Produk::all();
        $data ['kategori'] = Kategori::all();

        return view('admin.produk.produk', $data);
    }

    public function kategori()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', compact('kategori'));
    }

    public function toko()
    {
        $toko = Toko::all();
        return view('admin.toko.toko', compact('toko'));
    }

    public function user()
    {
        $user = User::all();
        return view('admin.user.user', compact('user'));
    }
}
