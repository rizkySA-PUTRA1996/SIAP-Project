<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriObat;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class KategoriObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kategoriobat(): View
    {
        //
        $kategori = KategoriObat::all();
        return view ('apotik.kategoriobat', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('create.kategoriObatCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'nama_kategori' => 'required|min:5',
        ],
        [
            'nama_kategori.required' => 'Nama Kategori Harus Diisi',
            'nama_kategori.min' => 'Nama Kategori Minimal 5 Karakter',
        ]);

        //create product
        DB::table('kategori_obat')->insert([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //redirect to kategoriobat
        return redirect()->route('apotik.kategoriobat')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        //
        $kategori = KategoriObat::findOrFail($id);
        return view ('apotik.kategoriobat', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $kategori = KategoriObat::findOrFail($id);
        return view('edit.kategoriObatEdit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $request->validate([
            'nama_kategori' => 'required|min:5',
        ],
        [
            'nama_kategori.required' => 'Nama Kategori Harus Diisi',
            'nama_kategori.min' => 'Nama Kategori Minimal 5 Karakter',
        ]);

        //update product
        DB::table('kategori_obat')->where('id_kategori', $id)->update([
            'nama_kategori' => $request->nama_kategori,
            'updated_at' => now()
        ]);
        //redirect to kategoriobat
        return redirect()->route('apotik.kategoriobat')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get product by ID
        $kategori = KategoriObat::findOrFail($id);
        //delete product
        $kategori->delete();

        //redirect to kategoriobat
        return redirect()->route('apotik.kategoriobat')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}
