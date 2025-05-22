<?php

namespace App\Http\Controllers\Api\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DetailAntrian;
use App\Models\Petugas\StokObat;
use Illuminate\Http\Request;

class AntrianDetailController extends Controller
{
    public function show($id)
    {
        try {
            // Ambil satu data DetailAntrian (e_resep_detail) berdasarkan ID (id_detail)
            $detail = DetailAntrian::with(['antrian', 'riwayat'])->findOrFail($id);

            $idResep = $detail->antrian->id_resep ?? null;

            $resepDetails = [];
            if ($idResep) {
                $resepDetails = DetailAntrian::with(['obat.kategori'])
                    ->where('id_resep', $idResep)
                    ->get()
                    ->map(function ($item) {
                        return [
                            'id_obat'    => $item->obat->id_obat ?? '-',
                            'nama_obat'    => $item->obat->nama_obat ?? '-',
                            'kategori'     => $item->kategori->nama_kategori ?? '-',
                            'bentuk_satuan'=> $item->obat->bentuk_satuan ?? '-',
                            'jumlah'       => $item->jumlah ?? '-',
                            'aturan_pakai' => $item->aturan_pakai ?? '-',
                        ];
                    });
            }

            return response()->json([
                'status' => true,
                'message' => 'Detail berhasil diambil',
                'data' => [
                    'antrian' => [
                        'no_antrian' => $detail->antrian->no_antrian ?? '-',
                        'id_resep'   => $detail->antrian->id_resep ?? '-',
                    ],
                    'riwayat' => [
                        'nama_pasien'       => $detail->riwayat->nama_pasien ?? '-',
                        'tanggal_diterima'  => $detail->riwayat->tanggal_diterima ?? '-',
                        'status'            => $detail->riwayat->status ?? '-',
                    ],
                    'resep_details' => $resepDetails,
                ]
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
