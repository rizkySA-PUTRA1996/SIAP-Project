<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Resources\ObatResource;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class StokObatController extends Controller
{
    public function index()
    {
        try {
            // Ambil semua data stok obat beserta relasi kategori
            $obat = StokObat::with(['kategori'])->get();

            return response()->json([
                'status' => true,
                'message' => 'Data Stok Obat',
                'data' => ObatResource::collection($obat),
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
