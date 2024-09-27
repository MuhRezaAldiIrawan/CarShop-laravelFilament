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
        Schema::create('katalog_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('nama mobil');
            $table->foreignId('tipe_model_id');
            $table->foreignId('kategori_id');
            $table->string('tahun_pembuatan');
            $table->string('jenis_bahan_bakar');
            $table->string('warna');
            $table->string('transmisi');
            $table->string('harga');
            $table->string('kapasitasi_mesin');
            $table->text('fitur_utama');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_mobil');
    }
};
