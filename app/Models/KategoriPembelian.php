<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPembelian extends Model
{
    use HasFactory;

    protected $table = 'kategori_pembelian';
    protected $fillable = [
        'nama'
    ];
}
