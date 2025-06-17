<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Petugas\AntrianController;
use App\Http\Controllers\Petugas\AntrianDetailController;
use App\Http\Controllers\Petugas\ObatController;
use App\Http\Controllers\Admin\ObatController as AdminObatController;
use App\Http\Controllers\Petugas\RiwayatController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
| Jika URL tidak cocok, redirect berdasarkan role atau ke login
*/
Route::fallback(function () {
    $user = Session::get('user');

    if ($user) {
        return match ($user['role']) {
            'Admin' => redirect()->route('admin.dashboard'),
            'Petugas' => redirect()->route('petugas.dashboard'),
            default => redirect()->route('login'),
        };
    }

    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Guest Routes (Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect()->route('login'));
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| PETUGAS Routes (Frontend Pages Only)
|--------------------------------------------------------------------------
*/
// Route::middleware(['auth', 'Petugas'])->prefix('petugas')->name('petugas.')->group(function () {
    Route::prefix('petugas')->name('petugas.')->group(function () {
        Route::get('dashboard', fn () => view('petugas.dashboard'))->name('dashboard');
        Route::get('antrean', [AntrianController::class, 'index'])->name('antrian');
        Route::get('obat', [ObatController::class, 'index'])->name('stokObat'); // diubah
        Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayatAntrian'); // diubah
        Route::get('detail-antrean/{id_resep}', [AntrianDetailController::class, 'show'])->name('antrianDetail'); // juga diubah jika perlu
    });

// });

/*
|--------------------------------------------------------------------------
| ADMIN Routes (Frontend Pages Only)
|--------------------------------------------------------------------------
*/
// Route::middleware(['auth', 'Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', fn () => view('admin.dashboard'))->name('dashboard');

        Route::get('obat', [AdminObatController::class, 'index'])->name('obat.index');
        Route::post('obat', [AdminObatController::class, 'store'])->name('obat.store');
        Route::put('obat/{id}', [AdminObatController::class, 'update'])->name('obat.update');
        Route::delete('obat/{id}', [AdminObatController::class, 'destroy'])->name('obat.destroy');
    });
// });
