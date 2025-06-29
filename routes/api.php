<?php

use App\Http\Controllers\Api\Admin\ObatController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\Petugas\AntrianController;
use App\Http\Controllers\Api\Petugas\AntrianDetailController;
use App\Http\Controllers\Api\Petugas\KategoriObatController;
use App\Http\Controllers\Api\Admin\KategoriObatController as AdminKategoriObatController;
use App\Http\Controllers\Api\Petugas\RiwayatController;
use App\Http\Controllers\Api\Petugas\StokObatController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::post('login', [LoginApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [LoginApiController::class, 'logout']);
// new route

Route::prefix('petugas')->name('petugas.')->group(function () {
    Route::resource('antrean', AntrianController::class);
    Route::resource('riwayat', RiwayatController::class);
    Route::resource('obat', StokObatController::class);
    Route::resource('detail-antrean', AntrianDetailController::class);
    Route::resource('kategori-obat', KategoriObatController::class);
});

// ROUTE UNTUK ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('obat', ObatController::class);
    Route::resource('kategori-obat', AdminKategoriObatController::class);
});
