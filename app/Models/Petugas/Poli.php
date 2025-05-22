<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $table ='poli';
    protected $fillable = [
        'id_poli',
        'nama_poli',
    ];

    public function antrian()
    {
        return $this->hasMany(Antrian::class, 'id_poli', 'id_poli');
    }
}
