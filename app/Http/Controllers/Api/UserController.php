<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => User::all()
        ], 200);
    }

    public function getDataById($id)
    {
        $user = User::where('id', $id)->first();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function getCurrentUser()
    {
        $user = Auth::user();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function getUserByRole($role)
    {
        $user = User::where('hak_akses', $role)->get();
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $user = User::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
        ], 200);
    }
}