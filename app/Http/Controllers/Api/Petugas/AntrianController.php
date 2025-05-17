<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $antrian = Antrian::all();

            $data = $antrian->map(function ($item, $index) {
                return [
                    'no' => $index + 1,
                    'rekam medis' => $item->rm,
                    'no resep' => $item->id_resep,
                    'id poli' => $item->id_poli,
                    'Antrean' => $item->no_antrian,
                    'status' => $item->status,
                ];
            });

            return response()->json([
                'status' => true,
                'message' => 'Data Antrian',
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
