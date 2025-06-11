<?php

use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Petugas\AntrianController;
use App\Http\Controllers\Petugas\AntrianDetailController;
use App\Http\Controllers\Petugas\RiwayatController;
use App\Http\Controllers\Petugas\StokObatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::fallback(function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'Admin') {
            return redirect()->route('admin.stokObat.index');
        } elseif ($user->role === 'Petugas') {
            return redirect()->route('petugas.antrian');
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
        Route::get('antrian', [AntrianController::class, 'index'])->name('petugas.antrian');
        Route::get('obat', [StokObatController::class, 'index'])->name('petugas.stokObat');
        Route::get('riwayat', [RiwayatController::class, 'index'])->name('petugas.riwayatAntrian');
        Route::get('detail/{id_resep}', [AntrianDetailController::class, 'show'])->name('petugas.antrianDetail');
    });

    Route::middleware(['auth', 'Admin'])->prefix('admin')->group(function () {
        Route::resource('/obat', ObatController::class)->names('admin.stokObat');
    });
