<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $antreanResponse  = Http::get('https://ti054a04.agussbn.my.id/api/petugas/detail-antrean');
        $obatResponse     = Http::get('https://ti054a04.agussbn.my.id/api/petugas/obat');
        $kategoriResponse = Http::get('https://ti054a04.agussbn.my.id/api/petugas/kategori-obat');
        $riwayatResponse  = Http::get('https://ti054a04.agussbn.my.id/api/petugas/riwayat');

        if (
            !$antreanResponse->successful() || !$obatResponse->successful() ||
            !$kategoriResponse->successful() || !$riwayatResponse->successful()
        ) {
            return redirect()->back()->withErrors(['api' => 'Gagal mengambil data dari satu atau lebih API.']);
        }

        $antrean  = collect($antreanResponse->json()['data'] ?? []);
        $obat     = collect($obatResponse->json()['data'] ?? []);
        $kategori = collect($kategoriResponse->json()['data'] ?? []);
        $riwayat  = collect($riwayatResponse->json()['data'] ?? []);

        $kategoriMap = $kategori->keyBy('id_kategori');
        $riwayatGrouped = $riwayat->groupBy('id_resep');

        $obatMap = $obat->mapWithKeys(function ($item) use ($kategoriMap) {
            $item['kategori'] = $kategoriMap[$item['id_kategori']] ?? ['nama_kategori' => '-'];
            return [$item['id_obat'] => $item];
        });

        // Gabungkan data dan group by id_resep
        $antreanGabung = $antrean->map(function ($item) use ($obatMap, $riwayatGrouped) {
            $item['obat'] = $obatMap[$item['id_obat']] ?? null;
            $item['kategori'] = $item['obat']['kategori'] ?? ['nama_kategori' => '-'];
            $item['riwayat'] = $riwayatGrouped[$item['id_resep']] ?? collect();
            return $item;
        });

        // Group by id_resep setelah digabung
        $grouped = $antreanGabung->groupBy('id_resep');

        // Pagination manual
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $sliced = $grouped->slice(($currentPage - 1) * $perPage, $perPage);

        $riwayatWithRelations = new LengthAwarePaginator(
            $sliced, // ← biarkan tetap associative
            $grouped->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('petugas.riwayatAntrian', ['riwayat' => $riwayatWithRelations]);
    }
}
