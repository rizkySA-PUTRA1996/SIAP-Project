<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    protected $table = 'kategori_obat';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'id_kategori',
        'nama_kategori',
    ];

    public function stokObat()
    {
        return $this->hasMany(StokObat::class, 'id_kategori', 'id_kategori');
    }
}
