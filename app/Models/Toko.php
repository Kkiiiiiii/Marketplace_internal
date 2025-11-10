<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $fillable = [
        'nama_toko','deskripsi','gambar','kontak_toko','alamat',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }

}
