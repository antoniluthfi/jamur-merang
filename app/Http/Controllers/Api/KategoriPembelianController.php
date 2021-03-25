<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriPembelian;

class KategoriPembelianController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => KategoriPembelian::all()
        ], 200);
    }

    public function getDataById($id)
    {
        $kategoriPembelian = KategoriPembelian::find($id);

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $kategoriPembelian
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $kategoriPembelian = KategoriPembelian::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $kategoriPembelian
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $kategoriPembelian = KategoriPembelian::find($id);
        $input = $request->all();
        $kategoriPembelian->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $kategoriPembelian
        ], 200);
    }

    public function delete($id)
    {
        $kategoriPembelian = KategoriPembelian::find($id);
        $kategoriPembelian->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
        ], 200);
    }
}
