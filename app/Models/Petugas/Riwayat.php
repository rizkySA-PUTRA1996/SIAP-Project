<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat';
    protected $fillable = [
        'id_resep',
        'rm',
        'nama_pasien',
        'tanggal_diterima',
        'tanggal_selesai',
        'status',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class, 'id_resep', 'id_resep');
    }
    public function detailAntrian()
    {
        return $this->hasMany(DetailAntrian::class, 'id_resep', 'id_resep');
    }
}
