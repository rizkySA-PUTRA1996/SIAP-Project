<?php

use App\Http\Controllers\Api\Admin\ObatController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\Petugas\AntrianController;
use App\Http\Controllers\Api\Petugas\AntrianDetailController;
use App\Http\Controllers\Api\Petugas\RiwayatController;
use App\Http\Controllers\Api\Petugas\StokObatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// default route
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// new route
Route::post('login', [LoginApiController::class, 'login']);

Route::resource('petugas/antrian', AntrianController::class);
Route::resource('petugas/riwayat', RiwayatController::class);
Route::resource('petugas/obat', StokObatController::class);
Route::resource('petugas/detail', AntrianDetailController::class);

Route::resource('admin/obat', ObatController::class)->names('admin.obat');
