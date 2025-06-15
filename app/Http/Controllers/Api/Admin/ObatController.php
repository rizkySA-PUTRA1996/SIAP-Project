<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ObatResource;
use App\Models\Admin\Obat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        try {
            $obat = Obat::with('kategori')->get();

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

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id_obat' => 'required|min:5|unique:obat,id_obat',
            'nama_obat' => 'required|min:5',
            'id_kategori' => 'required|numeric',
            'bentuk_satuan' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'kadaluarsa' => 'required|date',
        ]);

        try {
            $obat = Obat::create($validated);
            $obat->load('kategori');

            return response()->json([
                'message' => 'Data obat berhasil disimpan.',
                'data' => new ObatResource($obat)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $obat = Obat::with('kategori')->findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Data obat berhasil diambil.',
                'data' => new ObatResource($obat)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan.',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'stok' => 'nullable|numeric',
            'kadaluarsa' => 'nullable|date',
        ]);

        try {
            $obat = Obat::findOrFail($id);

            if (isset($validated['stok'])) {
                $obat->stok = $validated['stok'];
            }

            if (isset($validated['kadaluarsa'])) {
                $obat->kadaluarsa = $validated['kadaluarsa'];
            }

            $obat->save();
            $obat->load('kategori');

            return response()->json([
                'status' => true,
                'message' => 'Data obat berhasil diperbarui.',
                'data' => new ObatResource($obat)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $obat = Obat::findOrFail($id);
            $obat->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data obat berhasil dihapus.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data obat gagal dihapus.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }
}
