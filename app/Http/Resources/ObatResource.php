<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ObatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_obat'       => $this->id_obat,
            'nama_obat'     => $this->nama_obat,
            'id_kategori'   => $this->id_kategori,
            'bentuk_satuan' => $this->bentuk_satuan,
            'stok'          => $this->stok,
            'harga_jual'    => $this->harga,
            'kadaluarsa'    => $this->kadaluarsa,
        ];
    }
}
