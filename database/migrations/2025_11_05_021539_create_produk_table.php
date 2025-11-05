<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            //
            $table->id_produk();
            $table->foreignId('id_kategori')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->date('tanggal_upload');
            $table->foreignId('id_toko')->constrained('toko', 'id_toko');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            //
        });
    }
};
