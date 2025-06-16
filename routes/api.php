<?php

use App\Http\Controllers\Api\Admin\ObatController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\Petugas\AntrianController;
use App\Http\Controllers\Api\Petugas\AntrianDetailController;
use App\Http\Controllers\Api\Petugas\KategoriObatController;
use App\Http\Controllers\Api\Petugas\RiwayatController;
use App\Http\Controllers\Api\Petugas\StokObatController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

// new route
Route::post('/login', [LoginApiController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [LoginApiController::class, 'logout']);

Route::resource('petugas/antrean', AntrianController::class);
Route::resource('petugas/riwayat', RiwayatController::class);
Route::resource('petugas/obat', StokObatController::class);
Route::resource('petugas/detail-antrean', AntrianDetailController::class);
Route::resource('petugas/kategori-obat', KategoriObatController::class);

Route::resource('admin/obat', ObatController::class)->names('admin.obat');
