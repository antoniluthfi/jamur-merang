<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => DataBarang::all()
        ], 200);
    }

    public function getDataById($id)
    {
        $dataBarang = DataBarang::find($id);

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $dataBarang
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $dataBarang = DataBarang::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $dataBarang
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $dataBarang = DataBarang::find($id);
        $input = $request->all();
        $dataBarang->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $dataBarang
        ], 200);
    }

    public function delete($id)
    {
        $dataBarang = DataBarang::find($id);
        $dataBarang->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
        ], 200);
    }
}
