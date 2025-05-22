<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $primaryKey = 'id_obat';
    public $incrementing = false;
    protected $keyType = 'string';

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
}
