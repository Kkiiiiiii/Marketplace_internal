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
        Schema::create('gambar_produk', function (Blueprint $table) {
            //
            $table->id('id_gambar');
            $table->foreignId('id_produk')->constrained('produk','id_produk')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gambar_produk', function (Blueprint $table) {
            //
        });
    }
};
