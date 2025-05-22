<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ObatController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');

        $obat = Obat::with('kategori')
            ->when($search, function ($query, $search) {
                $query->where('nama_obat', 'like', "%$search%");
            })
            ->paginate(10);

        $kategori = DB::table('kategori_obat')->get();

        return view('admin.obat', compact('obat', 'kategori'));
    }

    public function create(): View
    {
        $kategori = DB::table('kategori_obat')->get();
        return view('admin.obat-create', compact('kategori'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_obat' => 'required|min:5',
            'nama_obat' => 'required|min:5',
            'id_kategori' => 'required|numeric',
            'bentuk_satuan' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'kadaluarsa' => 'required|date',
        ]);

        Obat::create([
            'id_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'id_kategori' => $request->id_kategori,
            'bentuk_satuan' => $request->bentuk_satuan,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kadaluarsa' => $request->kadaluarsa,
        ]);

        return redirect()->route('admin.stokObat.index')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit($id): View
    {
        $obat = Obat::findOrFail($id);
        $kategori = DB::table('kategori')->get();

        return view('admin.obat', compact('obat', 'kategori'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'stok_baru' => 'required|numeric',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update([
            'stok' => $request->stok_baru,
        ]);

        return redirect()->route('admin.stokObat.index')->with('success', 'Stok berhasil diperbarui!');
    }


    public function destroy($id): RedirectResponse
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('admin.stokObat')->with('success', 'Data Berhasil Dihapus!');
    }


}
