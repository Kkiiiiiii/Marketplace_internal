<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    //
    protected $table = 'gambar_produk';
    public $timestamps = false;
    
    protected $fillable =
    [
        'id_produk',
        'nama_gambar'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

}
