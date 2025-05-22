<?php

namespace App\Models\Admin;

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
        return $this->hasMany(Obat::class, 'id_kategori', 'id_kategori');
    }
}
