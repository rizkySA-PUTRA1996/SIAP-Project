<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'e_resep';
    protected $primarykey= 'id_resep';
    protected $fillable = [
        'id_resep',
        'no_antrian',
        'rm',
        'id_poli',
    ];
    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'id_resep', 'id_resep');
    }
    public function detailAntrian()
    {
        return $this->hasMany(DetailAntrian::class, 'id_resep', 'id_resep');
    }
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}
