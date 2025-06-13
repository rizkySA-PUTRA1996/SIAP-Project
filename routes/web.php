<?php

use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Petugas\AntrianController;
use App\Http\Controllers\Petugas\AntrianDetailController;
use App\Http\Controllers\Petugas\RiwayatController;
use App\Http\Controllers\Petugas\StokObatController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::resource('/obat', ObatController::class)->names('stokObat');
Route::resource('/riwayat', RiwayatController::class)->names('riwayat');

Route::get('petugas/dashboard', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard');
Route::get('petugas/antrian', [AntrianController::class, 'index'])->name('petugas.antrian');
Route::get('petugas/obat', [StokObatController::class, 'index'])->name('petugas.stokObat');
Route::get('petugas/riwayat', [RiwayatController::class, 'index'])->name('petugas.riwayatAntrian');
Route::get('petugas/detail/{id_resep}', [AntrianDetailController::class, 'show'])->name('petugas.antrianDetail');
