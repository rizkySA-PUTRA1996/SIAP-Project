<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DetailAntrian;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        try {
            // Ambil semua detail antrian beserta relasi
            $riwayat = DetailAntrian::with(['riwayat', 'antrian', 'obat'])->get();

            // Kelompokkan berdasarkan id_resep
            $grouped = $riwayat->groupBy('id_resep');

            // Format data sesuai struktur yang dibutuhkan frontend (mirip modal HTML)
            $data = $grouped->map(function ($items, $id_resep) {
                $first = $items->first();

                return [
                    'id_resep' => $id_resep,
                    'nama_pasien' => $first->riwayat->nama_pasien ?? '-',
                    'obat' => $items->map(function ($detail) {
                        return [
                            'kode_obat' => $detail->obat->kode_obat ?? '-',
                            'nama_obat' => $detail->obat->nama_obat ?? '-',
                            'kategori_obat' => $detail->obat->kategori_obat ?? '-',
                            'bentuk_satuan' => $detail->obat->bentuk_satuan ?? '-',
                            'jumlah' => $detail->jumlah,
                        ];
                    })->values(),
                ];
            })->values(); // `values()` untuk reset index jadi numerik

            return response()->json([
                'status' => true,
                'message' => 'Data Riwayat E-Resep',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => [],
            ], 500);
        }
    }
}
