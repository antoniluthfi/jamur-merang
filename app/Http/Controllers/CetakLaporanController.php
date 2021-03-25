<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CetakLaporanController extends Controller
{
    public function cetakLaporan($tipeLaporan, $id_sales, $dari, $sampai)
    {
        $dari = "$dari 00:00:00";
        $sampai = "$sampai 23:59:59";
        
        if($tipeLaporan === 'record-penjualan') {
            $data = DB::select("SELECT 
                    users.id, 
                    DATE_FORMAT(record_penjualan.created_at, '%Y-%m-%d') AS day, 
                    users.name, 
                    record_penjualan.area, 
                    record_penjualan.kunjungan, 
                    record_penjualan.kunjungan_efektif, 
                    data_barang.nama_barang, 
                    list_pembelian_barang.jumlah, 
                    (list_pembelian_barang.jumlah * data_barang.harga_retail) AS harga,
                    kategori_pembelian.nama FROM `record_penjualan` 
                LEFT JOIN users ON record_penjualan.user_id = users.id 
                LEFT JOIN list_pembelian_barang ON record_penjualan.id = list_pembelian_barang.id_record_penjualan 
                LEFT JOIN data_barang ON list_pembelian_barang.id_barang = data_barang.id 
                LEFT JOIN kategori_pembelian ON record_penjualan.id_kategori_pembelian = kategori_pembelian.id 
                WHERE (record_penjualan.created_at BETWEEN '$dari' AND '$sampai')
                AND record_penjualan.user_id = '$id_sales'"
            );
        }
        
        $array = ['data' => $data];

        $pdf = PDF::loadView($tipeLaporan, $array, [], [
            'mode'                 => '',
            'format'               => 'A4',
            'default_font_size'    => '12',
            'margin_left'          => 2,
            'margin_right'         => 2,
            'margin_top'           => 2,
            'margin_bottom'        => 2,
            'margin_header'        => 1,
            'margin_footer'        => 1,
            'orientation'          => 'P',
            'title'                => $tipeLaporan,
            'author'               => 'Antoni Luthfi',
            'watermark'            => '',
            'show_watermark'       => false,
            'watermark_font'       => 'sans-serif',
            'display_mode'         => 'real',
            'watermark_text_alpha' => 0.1,
            'custom_font_dir'      => '',
            'custom_font_data' 	   => [],
            'auto_language_detection'  => false,
            'temp_dir'               => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
            'pdfa' 			=> false,
            'pdfaauto' 		=> false,
        ]);
        return $pdf->stream("$tipeLaporan.pdf");
    }
}
