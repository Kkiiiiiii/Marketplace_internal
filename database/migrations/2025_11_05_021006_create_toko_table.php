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
        Schema::table('toko', function (Blueprint $table) {
            //
            $table->id_toko();
            $table->string('nama_toko');
            $table->text('deskripi');
            $table->string('gambar');
            $table->foreignId('id_user')->constrained('users','id_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kontak_toko');
            $table->text('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('toko', function (Blueprint $table) {
            //
        });
    }
};
