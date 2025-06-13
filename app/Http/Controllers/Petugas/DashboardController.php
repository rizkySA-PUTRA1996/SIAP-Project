<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Obat;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard Petugas.
     * Mengambil data statistik dan ringkasan yang relevan untuk petugas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- Data Dummy / Placeholder untuk Dashboard Petugas ---
        // Anda akan mengganti ini dengan query database yang sebenarnya kena kontak aku ja

        // Contoh: Antrean Aktif (misal: status 'menunggu' atau 'diproses')
        $antreanAktif = 5; // Antrian::whereIn('status', ['menunggu', 'diproses'])->count();

        // Contoh: Obat Hampir Habis (stok < 10, bisa jadi peringatan)
        $obatHampirHabis = 20; // Obat::where('stok', '<', 10)->count();

        // Contoh: Resep Terproses Hari Ini
        $resepTerprosesHariIni = 32; // Antrian::whereDate('updated_at', today())->where('status', 'selesai')->count();

        // Contoh: Antrean Terbaru (untuk list di kartu)
        $antreanTerbaru = [
            ['no_antrean' => 110, 'rm' => '000012345', 'status' => 'Menunggu'],
            ['no_antrean' => 109, 'rm' => '000012344', 'status' => 'Sudah Bayar'],
            ['no_antrean' => 108, 'rm' => '000012343', 'status' => 'Menunggu'],
        ];

        // Contoh: Obat Stok Rendah (untuk list di kartu)
        $obatStokRendah = [
            ['nama' => 'Obat A', 'bentuk_satuan' => 'Sirup', 'stok' => 3],
            ['nama' => 'Obat B', 'bentuk_satuan' => 'Tablet', 'stok' => 5],
            ['nama' => 'Obat C', 'bentuk_satuan' => 'Krim', 'stok' => 2],
        ];

        // --- Akhir Data Dummy ---

        return view('petugas.dashboard', compact(
            'antreanAktif',
            'obatHampirHabis',
            'resepTerprosesHariIni',
            'antreanTerbaru',
            'obatStokRendah'
        ));
    }
}
