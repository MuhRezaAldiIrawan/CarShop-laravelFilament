<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogMobil extends Model
{
    use HasFactory;

    protected $table = 'katalog_mobil';

    protected $fillable = [
        'nama_mobil',
        'tipe_model_id',
        'kategori_id',
        'tahun_pembuatan',
        'jenis_bahan_bakar',
        'warna',
        'transmisi',
        'harga',
        'kapasitasi_mesin',
        'fitur_utama',
        'deskripsi',
    ];

    public function tipe_model()
    {
        return $this->belongsTo(TipeModel::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }




}
