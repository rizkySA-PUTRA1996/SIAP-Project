<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Obat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Ambil semua detail antrian beserta relasi
            $obat = Obat::with(['kategori'])->get();

            // Format data sesuai struktur yang dibutuhkan frontend (mirip modal HTML)
            $data = $obat->map(function ($item) {

                return [
                    'id_obat' => $item->id_obat,
                    'nama_obat' => $item->nama_obat,
                    'kategori' => $item->kategori->nama_kategori,
                    'bentuk_satuan' => $item->bentuk_satuan,
                    'stok' => $item->stok,
                    'harga_jual' => $item->harga,
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
            return response()->json([
                'message' => 'Data obat berhasil disimpan.',
                'data' => $obat
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
            $obat = Obat::with(['kategori'])->findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Data obat berhasil diambil.',
                'data' => [
                    'id_obat' => $obat->id_obat,
                    'nama_obat' => $obat->nama_obat,
                    'kategori' => $obat->kategori->nama_kategori ?? null,
                    'bentuk_satuan' => $obat->bentuk_satuan,
                    'stok' => $obat->stok,
                    'harga jual' => $obat->harga,
                    'kadaluarsa' => $obat->kadaluarsa,
                ]
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
        // Validasi input
        $validated = $request->validate([
            'stok' => 'nullable|numeric',
            'kadaluarsa' => 'nullable|date',
        ]);

        try {
            // Cari obat berdasarkan ID
            $obat = Obat::findOrFail($id);

            // Update data jika ada input yang valid
            if (isset($validated['stok'])) {
                $obat->stok = $validated['stok'];
            }

            if (isset($validated['kadaluarsa'])) {
                $obat->kadaluarsa = $validated['kadaluarsa'];
            }

            $obat->save();
            $obat->load('kategori'); // Pastikan relasi dimuat

            // Response JSON dengan struktur terformat
            return response()->json([
                'status' => true,
                'message' => 'Data obat berhasil diperbarui.',
                'data' => [
                    'id_obat' => $obat->id_obat,
                    'nama_obat' => $obat->nama_obat,
                    'kategori' => $obat->kategori->nama_kategori ?? null,
                    'bentuk_satuan' => $obat->bentuk_satuan,
                    'stok' => $obat->stok,
                    'harga jual' => $obat->harga,
                    'kadaluarsa' => $obat->kadaluarsa,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id_obat): JsonResponse
    {
        try {
            $obat = Obat::findOrFail($id_obat);
            $obat->delete();

            return response()->json([
                'status' => true,
                'message' => 'Data obat berhasil dihapus.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data obat gagal dihapus.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }
}
