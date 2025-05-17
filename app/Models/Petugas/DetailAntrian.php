<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class DetailAntrian extends Model
{
    protected $table = 'e_resep_detail';
    protected $fillable = [
        'id_detail',
        'id_resep',
        'id_obat',
        'jumlah',
        'aturan_pakai',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class, 'id_resep', 'id_resep');
    }
    public function obat()
    {
        return $this->belongsTo(StokObat::class, 'id_obat', 'id_obat');
    }
    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class, 'id_resep', 'id_resep');
    }
}
