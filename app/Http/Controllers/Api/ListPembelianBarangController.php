<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListPembelianBarang;

class ListPembelianBarangController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => ListPembelianBarang::with('detailBarang')->get()
        ], 200);
    }

    public function getDataById($id)
    {
        $listPembelian = ListPembelianBarang::with('detailBarang')->where('id_record_penjualan', $id)->get();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $listPembelian
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        for ($i = 0; $i < count($input['payload']); $i++) { 
            if($input['payload'][$i]['id_barang'] != '') {
                $listPembelian = ListPembelianBarang::create($input['payload'][$i]);
            }
        }

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $input
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = ListPembelianBarang::where('id_record_penjualan', $id)->get();
        for ($i = 0; $i < count($data); $i++) { 
            $data[$i]->delete();
        }

        $input = $request->all();
        $listPembelian = ListPembelianBarang::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $request->all()
        ], 200);
    }

    public function delete($id)
    {
        $listPembelian = ListPembelianBarang::where('id_record_penjualan', $id)->get();
        for ($i = 0; $i < count($listPembelian); $i++) { 
            $listPembelian[$i]->delete();
        }

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
            'result' => null
        ], 200);
    }
}
