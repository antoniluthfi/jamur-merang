<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecordPenjualan;

class RecordPenjualanController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => RecordPenjualan::with('user', 'barang', 'kategoriPembelian')->get()
        ], 200);
    }

    public function getDataById($id)
    {
        $recordPenjualan = RecordPenjualan::with('user', 'barang', 'kategoriPembelian')->where('id', $id)->first();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $recordPenjualan
        ], 200);
    }

    public function getDataByUserId($id)
    {
        $recordPenjualan = RecordPenjualan::with('user', 'barang', 'kategoriPembelian')->where('user_id', $id)->get();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $recordPenjualan
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $recordPenjualan = RecordPenjualan::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $recordPenjualan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $recordPenjualan = RecordPenjualan::find($id);
        $input = $request->all();
        $recordPenjualan->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $recordPenjualan
        ], 200);
    }

    public function delete($id)
    {
        $recordPenjualan = RecordPenjualan::find($id);
        $recordPenjualan->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
            'result' => $recordPenjualan
        ], 200);
    }
}
