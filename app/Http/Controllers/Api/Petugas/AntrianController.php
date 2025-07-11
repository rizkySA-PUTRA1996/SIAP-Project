<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Resources\AntrianResource;
use App\Models\Petugas\Antrian;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $antrian = Antrian::all();

            return response()->json([
                'status' => true,
                'message' => 'Data Antrian',
                'data' => AntrianResource::collection($antrian),
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
