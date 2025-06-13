<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Penjualan;
use App\Models\Antrian;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard Admin.
     * Mengambil data statistik dan ringkasan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- Data Dummy / Placeholder untuk Dashboard Admin ---
        // Anda akan mengganti ini dengan query database yang sebenarnya ken wan

        // Contoh: Total Obat
        $totalObat = 5230; // Obat::count();

        // Contoh: Obat dengan Stok Habis (stok < 10)
        $stokHabis = 15; // Obat::where('stok', '<', 10)->count();

        // Contoh: Total Penjualan Hari Ini
        $penjualanHariIni = 12500000; // Penjualan::whereDate('created_at', today())->sum('total_harga');

        // Contoh: Antrean Hari Ini
        $antreanHariIni = 45; // Antrian::whereDate('created_at', today())->count();

        // Contoh: Obat Terlaris (untuk list di kartu)
        $obatTerlaris = [
            ['nama' => 'Paracetamol 500mg', 'jumlah' => 250],
            ['nama' => 'Amoxicillin 250mg', 'jumlah' => 180],
            ['nama' => 'Vitamin C 1000mg', 'jumlah' => 150],
            ['nama' => 'Ibuprofen 400mg', 'jumlah' => 120],
            ['nama' => 'Obat Batuk Sirup', 'jumlah' => 100],
        ];

        // --- Akhir Data Dummy ---

        return view('admin.dashboard', compact(
            'totalObat',
            'stokHabis',
            'penjualanHariIni',
            'antreanHariIni',
            'obatTerlaris'
        ));
    }
}
