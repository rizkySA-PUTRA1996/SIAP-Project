<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data obat
        $obatResponse = Http::get('https://ti054a04.agussbn.my.id/api/petugas/obat');

        if (!$obatResponse->successful()) {
            return redirect()->back()->withErrors(['api' => 'Gagal mengambil data obat dari API.']);
        }

        // Ambil data kategori
        $kategoriResponse = Http::get('https://ti054a04.agussbn.my.id/api/petugas/kategori-obat');

        if (!$kategoriResponse->successful()) {
            return redirect()->back()->withErrors(['api' => 'Gagal mengambil data kategori dari API.']);
        }

        $obatData = collect($obatResponse->json()['data'] ?? []);
        $kategoriData = collect($kategoriResponse->json()['data'] ?? []);

        // Buat array asosiatif kategori berdasarkan id_kategori
        $kategoriMap = $kategoriData->keyBy('id_kategori');

        // Sisipkan data kategori ke masing-masing obat
        $obatData = $obatData->map(function ($item) use ($kategoriMap) {
            $item['kategori'] = $kategoriMap[$item['id_kategori']] ?? ['nama_kategori' => '-'];
            return $item;
        });

        // Simulasi pagination manual
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $obatData->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $stokObat = new LengthAwarePaginator($pagedData, $obatData->count(), $perPage, $currentPage, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('petugas.stokObat', compact('stokObat'));
    }
}
