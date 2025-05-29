<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EResepDetail extends Model
{
    //
    use HasFactory;
    // add fillable
    protected $fillable = [
        'id_resep',
        'id_obat',
        'jumlah',
        'aturan_pakai',
        'total_harga'
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
