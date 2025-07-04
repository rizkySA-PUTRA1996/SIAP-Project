<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Resources\AntrianDetailResource;
use App\Models\Petugas\DetailAntrian;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class AntrianDetailController extends Controller
{
    public function index()
    {
        try {
            $detail = DetailAntrian::all();

            return response()->json([
                'status' => true,
                'message' => 'Detail Resep berhasil diambil',
                'data' => AntrianDetailResource::collection($detail),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'data' => [],
            ], 500);
        }
    }

    public function show($id_resep)
    {
        try {
            $detail = DetailAntrian::where('id_resep', $id_resep)->get();

            return response()->json([
                'status' => true,
                'message' => 'Detail resep berhasil diambil',
                'data' => AntrianDetailResource::collection($detail)
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
