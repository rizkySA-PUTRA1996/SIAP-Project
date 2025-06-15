<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Resources\RiwayatResource;
use App\Models\Petugas\Riwayat;
use Illuminate\Http\JsonResponse;

class RiwayatController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $riwayat = Riwayat::all();

            return response()->json([
                'status' => true,
                'message' => 'Data Riwayat',
                'data' => RiwayatResource::collection($riwayat),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data: ' . $e->getMessage(),
                'data' => [],
            ], 500);
        }
    }
}
