<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AntrianDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'antrian' => [
                'no_antrian' => $this->antrian->no_antrian ?? '-',
                'id_resep'   => $this->antrian->id_resep ?? '-',
            ],
            'riwayat' => [
                'nama_pasien'      => $this->riwayat->nama_pasien ?? '-',
                'tanggal_diterima' => $this->riwayat->tanggal_diterima ?? '-',
                'status'           => $this->riwayat->status ?? '-',
            ],
            'resep_details' => $this->whenLoaded('resep_details', function () {
                return $this->resep_details->map(function ($item) {
                    return [
                        'id_obat'       => $item->obat->id_obat ?? '-',
                        'nama_obat'     => $item->obat->nama_obat ?? '-',
                        'kategori'      => $item->kategori->nama_kategori ?? '-',
                        'bentuk_satuan' => $item->obat->bentuk_satuan ?? '-',
                        'jumlah'        => $item->jumlah ?? '-',
                        'aturan_pakai'  => $item->aturan_pakai ?? '-',
                    ];
                });
            }),
        ];
    }
}
