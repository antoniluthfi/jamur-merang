<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordPenjualan extends Model
{
    use HasFactory;

    protected $table = 'record_penjualan';
    protected $fillable = [
        'user_id',
        'area',
        'id_kategori_pembelian',
        'kunjungan',
        'kunjungan_efektif',
        'nominal'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function barang()
    {
        return $this->hasOne(ListPembelianBarang::class, 'id_record_penjualan', 'id')->with('detailBarang');
    }

    public function kategoriPembelian()
    {
        return $this->hasOne(KategoriPembelian::class, 'id', 'id_kategori_pembelian');
    }
}
