<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function tipemodel()
    {
        return $this->hasMany(TipeModel::class);
    }

    public function katalogmobil()
    {
        return $this->hasMany(KatalogMobil::class);
    }


}
