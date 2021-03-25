<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DataBarangController;
use App\Http\Controllers\Api\KategoriPembelianController;
use App\Http\Controllers\Api\RecordPenjualanController;
use App\Http\Controllers\Api\ListPembelianBarangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('user', [UserController::class, 'index']);
    Route::get('user/my/profile', [UserController::class, 'getCurrentUser']);
    Route::get('user/{id}', [UserController::class, 'getDataById']);
    Route::get('user/role/{role}', [UserController::class, 'getUserByRole']);
    Route::post('user', [UserController::class, 'create']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user', [UserController::class, 'delete']);

    Route::get('data-barang', [DataBarangController::class, 'index']);
    Route::get('data-barang/{id}', [DataBarangController::class, 'getDataById']);
    Route::post('data-barang', [DataBarangController::class, 'create']);
    Route::put('data-barang/{id}', [DataBarangController::class, 'update']);
    Route::delete('data-barang', [DataBarangController::class, 'delete']);

    Route::get('kategori-pembelian', [KategoriPembelianController::class, 'index']);
    Route::get('kategori-pembelian/{id}', [KategoriPembelianController::class, 'getDataById']);
    Route::post('kategori-pembelian', [KategoriPembelianController::class, 'create']);
    Route::put('kategori-pembelian/{id}', [KategoriPembelianController::class, 'update']);
    Route::delete('kategori-pembelian/{id}', [KategoriPembelianController::class, 'delete']);

    Route::get('list-pembelian-barang', [ListPembelianBarangController::class, 'index']);
    Route::get('list-pembelian-barang/{id}', [ListPembelianBarangController::class, 'getDataById']);
    Route::post('list-pembelian-barang', [ListPembelianBarangController::class, 'create']);
    Route::put('list-pembelian-barang/{id}', [ListPembelianBarangController::class, 'update']);
    Route::delete('list-pembelian-barang/{id}', [ListPembelianBarangController::class, 'delete']);

    Route::get('record-penjualan', [RecordPenjualanController::class, 'index']);
    Route::get('record-penjualan/{id}', [RecordPenjualanController::class, 'getDataById']);
    Route::get('record-penjualan/user/{id}', [RecordPenjualanController::class, 'getDataByUserId']);
    Route::post('record-penjualan', [RecordPenjualanController::class, 'create']);
    Route::put('record-penjualan/{id}', [RecordPenjualanController::class, 'update']);
    Route::delete('record-penjualan/{id}', [RecordPenjualanController::class, 'delete']);
});