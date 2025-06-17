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
            'id_resep_detail'       => $this->id_resep_detail,
            'id_resep'              => $this->id_resep,
            'id_obat'               => $this->id_obat,
            'jumlah'                => $this->jumlah,
            'aturan_pakai'          => $this->aturan_pakai ?? null,
            'total_harga'           => $this->total_harga ?? null,
        ];
    }
}
