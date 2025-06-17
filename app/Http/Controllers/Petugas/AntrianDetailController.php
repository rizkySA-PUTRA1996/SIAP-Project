<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class AntrianDetailController extends Controller
{
    public function show($id)
    {
        // Ambil data dari API eksternal
        $responseAntrian  = Http::get("https://ti054a04.agussbn.my.id/api/petugas/antrean");
        $responseDetail   = Http::get("https://ti054a04.agussbn.my.id/api/petugas/detail-antrean/{$id}");
        $responseObat     = Http::get("https://ti054a04.agussbn.my.id/api/petugas/obat");
        $responseKategori = Http::get("https://ti054a04.agussbn.my.id/api/petugas/kategori-obat");

        $antrian     = $responseAntrian->json()['data'] ?? [];
        $detailResep = $responseDetail->json()['data'] ?? [];
        $obat        = $responseObat->json()['data'] ?? [];
        $kategori    = $responseKategori->json()['data'] ?? [];

        // Ambil data antrean yang cocok
        $antrianTerkait = collect($antrian)->first(function ($a) use ($id) {
            return is_array($a) && isset($a['id_resep']) && $a['id_resep'] == $id;
        });

        // Proses detail resep
        $detailFinal = [];
        foreach ($detailResep as $item) {
            if (!is_array($item)) continue;

            $idObat = $item['id_obat'] ?? null;

            $obatData = collect($obat)->first(function ($o) use ($idObat) {
                return is_array($o) && isset($o['id_obat']) && trim($o['id_obat']) == trim($idObat);
            });

            $kategoriData = null;
            if ($obatData && isset($obatData['id_kategori'])) {
                $kategoriData = collect($kategori)->first(function ($k) use ($obatData) {
                    return is_array($k) && isset($k['id_kategori']) && $k['id_kategori'] == $obatData['id_kategori'];
                });
            }

            $item['obat']     = $obatData ?? [];
            $item['kategori'] = $kategoriData ?? [];

            $detailFinal[] = $item;
        }

        $detail = [
            'antrean'      => $antrianTerkait,
            'resepDetails' => $detailFinal
        ];
        
        return view('petugas.antrianDetail', compact('detail'));
    }
}
