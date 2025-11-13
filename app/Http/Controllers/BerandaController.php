<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $data['produk'] = Produk::all();
        return view('beranda', $data);
    }
}
