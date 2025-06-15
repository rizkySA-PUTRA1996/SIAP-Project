<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriObatResource;
use App\Models\Admin\KategoriObat;
use Illuminate\Http\Request;

class KategoriObatController extends Controller
{
    public function index()
    {
        $kategori = KategoriObat::all();
        return KategoriObatResource::collection($kategori);
    }

    // Menampilkan 1 kategori berdasarkan ID
    public function show($id)
    {
        $kategori = KategoriObat::findOrFail($id);
        return new KategoriObatResource($kategori);
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori = KategoriObat::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return response()->json([
            'message' => 'Kategori berhasil ditambahkan',
            'data'    => new KategoriObatResource($kategori)
        ], 201);
    }

    // Mengupdate kategori
    public function update(Request $request, $id)
    {
        $kategori = KategoriObat::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui',
            'data'    => new KategoriObatResource($kategori)
        ]);
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = KategoriObat::findOrFail($id);
        $kategori->delete();

        return response()->json([
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}
