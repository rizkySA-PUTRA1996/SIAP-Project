<?php

use App\Http\Controllers\Api\Petugas\AntrianController;
use App\Http\Controllers\Api\Petugas\RiwayatController;
use App\Http\Controllers\Api\Petugas\StokObatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('petugas/antrian', AntrianController::class);
Route::resource('petugas/riwayat', RiwayatController::class);
Route::resource('petugas/obat', StokObatController::class);
