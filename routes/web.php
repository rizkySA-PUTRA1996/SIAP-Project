<?php

use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Petugas\AntrianController;
use App\Http\Controllers\Petugas\AntrianDetailController;
use App\Http\Controllers\Petugas\RiwayatController;
use App\Http\Controllers\Petugas\StokObatController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'Petugas') {
            return redirect()->route('petugas.dashboard');
        }
    }
    return redirect()->route('login');
});

Route::middleware('guest')->prefix('/')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::post('logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

    Route::middleware(['auth', 'Petugas'])->prefix('petugas')->group(function () {
        Route::get('dashboard', [PetugasDashboardController::class, 'index'])->name('petugas.dashboard');
        Route::get('antrean', [AntrianController::class, 'index'])->name('petugas.antrian');
        Route::get('obat', [StokObatController::class, 'index'])->name('petugas.stokObat');
        Route::get('riwayat', [RiwayatController::class, 'index'])->name('petugas.riwayatAntrian');
        Route::get('detail/{id_resep}', [AntrianDetailController::class, 'show'])->name('petugas.antrianDetail');
    });

    Route::middleware(['auth', 'Admin'])->prefix('admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('obat', ObatController::class)->names('admin.stokObat');
    });
