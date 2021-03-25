<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPembelianBarang extends Model
{
    use HasFactory;

    protected $table = 'list_pembelian_barang';
    protected $primaryKey = 'id_record_penjualan';
    protected $fillable = [
        'id_record_penjualan',
        'id_barang',
        'jumlah'
    ];

    public function detailBarang()
    {
        return $this->hasOne(DataBarang::class, 'id', 'id_barang');
    }
}
