<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $obatResponse = Http::get('https://ti054a04.agussbn.my.id/api/admin/obat');
        $kategoriResponse = Http::get('https://ti054a04.agussbn.my.id/api/admin/kategori-obat');

        $obatData = collect($obatResponse->json()['data'] ?? []);
        $kategoriData = collect($kategoriResponse->json()['data'] ?? []);

        // Mapping kategori
        $kategoriMap = $kategoriData->keyBy('id_kategori');

        $obatData = $obatData->map(function ($item) use ($kategoriMap) {
            $item['kategori'] = $kategoriMap[$item['id_kategori']] ?? ['nama_kategori' => '-'];
            return $item;
        });

        // Simulasi pagination manual
        $perPage = 10;
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $obatData->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $stokObat = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $obatData->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Kirim ke view
        return view('admin.obat', [
            'stokObat' => $stokObat,
            'kategori' => $kategoriData, // <-- INI PENTING
        ]);
    }
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id_obat' => 'required|min:5',
            'nama_obat' => 'required|min:5',
            'id_kategori' => 'required|integer',
            'bentuk_satuan' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
            'kadaluarsa' => 'required|date',
        ]);

        // Kirim data ke API
        $response = Http::post('https://ti054a04.agussbn.my.id/api/admin/obat', $validated);

        // Jika sukses, redirect ke halaman utama dengan pesan
        if ($response->successful()) {
            return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil ditambahkan.');
        }
        // Jika gagal, ambil ulang data dari API
        $obatResponse     = Http::get('https://ti054a04.agussbn.my.id/api/admin/obat');
        $kategoriResponse = Http::get('https://ti054a04.agussbn.my.id/api/admin/kategori-obat');

        $obatData     = collect($obatResponse->json()['data'] ?? []);
        $kategoriData = collect($kategoriResponse->json()['data'] ?? []);

        // Buat map kategori
        $kategoriMap = $kategoriData->keyBy('id_kategori');

        // Gabungkan kategori ke setiap obat
        $obatData = $obatData->map(function ($item) use ($kategoriMap) {
            $item['kategori'] = $kategoriMap[$item['id_kategori']] ?? ['nama_kategori' => '-'];
            return $item;
        });

        // Pagination manual
        $perPage     = 10;
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $pagedData   = $obatData->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $stokObat = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $obatData->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Kembalikan ke view dengan input lama & error
        return view('admin.obat', [
            'stokObat' => $stokObat,
            'kategori' => $kategoriData,
        ]);
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_obat' => 'required|string',
            'id_kategori' => 'required|string',
            'stok' => 'required|integer'
        ]);

        $response = Http::put("https://ti054a04.agussbn.my.id/api/petugas/obat/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil diperbarui.');
        }

        return redirect()->back()->withErrors(['api' => 'Gagal memperbarui data.']);
    }

    public function destroy($id)
    {
        $response = Http::delete("https://ti054a04.agussbn.my.id/api/petugas/obat/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.obat.index')->with('success', 'Obat berhasil dihapus.');
        }

        return redirect()->back()->withErrors(['api' => 'Gagal menghapus data.']);
    }
}
