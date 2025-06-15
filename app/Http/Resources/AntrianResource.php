<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AntrianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_resep'       => $this->id_resep,
            'no_antrian'     => $this->no_antrian,
            'rekam_medis'    => $this->rm,
            'id_poli'        => $this->id_poli,
            'poli'           => $this->poli->nama_poli ?? null,
            'no_registrasi'  => $this->no_registrasi ?? null,
            'status'         => $this->status ?? null,
            'riwayat'        => $this->whenLoaded('riwayat'),
            'detail_antrian' => $this->whenLoaded('detailAntrian'),
        ];
    }
}
