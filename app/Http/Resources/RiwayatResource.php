<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RiwayatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_riwayat'       => $this->id_riwayat,
            'id_resep'         => $this->id_resep,
            'tanggal_diterima' => $this->tanggal_diterima,
            'tanggal_selesai'  => $this->tanggal_selesai,
            'status'           => $this->status,
        ];
    }
}
