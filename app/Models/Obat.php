<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    //
    use HasFactory;
    // add fillable
    protected $fillable = [
        'nama_obat',
        'id_kategori',
        'bentuk_satuan',
        'harga',
        'stok',
        'kadaluarsa',
        'created_at',
        'updated_at',
    ];
    // add guaded
    protected $guarded = ['id'];
    public $incrementing = false;
    protected $keyType = 'string';

    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    public function kategori_obat()
    {
        return $this->belongsTo(KategoriObat::class, 'id_kategori');
    }
}
