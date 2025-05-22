<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class StokObat extends Model
{
    protected $table = 'obat';
    protected $fillable = [
        'id_obat',
        'nama_obat',
        'bentuk_satuan',
        'stok',
        'harga',
        'kadaluarsa',
        'id_kategori',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriObat::class, 'id_kategori', 'id_kategori');
    }
    public function detailAntrian()
    {
        return $this->hasMany(DetailAntrian::class, 'id_obat', 'id_obat');
    }
}

