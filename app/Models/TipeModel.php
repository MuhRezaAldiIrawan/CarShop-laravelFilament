<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeModel extends Model
{
    use HasFactory;

    protected $table = 'tipe_model';

    protected $fillable = [
        'kategori_id',
        'gambar',
        'nama',
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function katalogmobil()
    {
        return $this->hasMany(KatalogMobil::class);
    }

}
