<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class StokObatController extends Controller
{
    public function index()
    {
        try {
            // Ambil semua detail antrian beserta relasi
            $obat = StokObat::with(['kategori'])->get();

            // Format data sesuai struktur yang dibutuhkan frontend (mirip modal HTML)
            $data = $obat->map(function ($item) {

                return [
                    'kode obat' => $item->kode_obat,
                    'nama obat' => $item->nama_obat,
                    'kategori' => $item->kategori->nama_kategori,
                    'bentuk satuan' => $item->bentuk_satuan,
                    'stok' => $item->stok,
                    'harga jual' => $item->harga,
                    'kadaluarsa' => $item->kadaluarsa,
                        ];
                    });

            return response()->json([
                'status' => true,
                'message' => 'Data Stok Obat',
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
