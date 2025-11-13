<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $primaryKey = 'id_toko';
    public $timestamps = false;

    protected $fillable = [
        'nama_toko','deskripsi','gambar','kontak_toko','alamat','id_user'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko', 'id_toko');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

}
