<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Resources\AntrianDetailResource;
use App\Models\Petugas\DetailAntrian;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class AntrianDetailController extends Controller
{
    public function show($id)
    {
        try {
            // Ambil satu detail
            $detail = DetailAntrian::with(['antrian', 'riwayat'])->findOrFail($id);
            $idResep = $detail->antrian->id_resep ?? null;

            // Ambil semua detail lain berdasarkan id_resep yang sama (untuk modal resep)
            if ($idResep) {
                $resepDetails = DetailAntrian::with(['obat.kategori'])
                    ->where('id_resep', $idResep)
                    ->get();
                // inject manual property ke resource
                $detail->setRelation('resep_details', $resepDetails);
            }

            return response()->json([
                'status' => true,
                'message' => 'Detail berhasil diambil',
                'data' => new AntrianDetailResource($detail)
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
