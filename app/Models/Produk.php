<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $fillable = [
        'nama_produk','harga','stok','deskripsi','tanggal_upload'
    ];

     public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function gambarProduk()
    {
        return $this->hasMany(Gambar::class, 'id_produk');
    }



}
