<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    //
    use HasFactory;
    // add fillable
    protected $fillable = [
        'id_resep',
        'tanggal_diterima',
        'tanggal_dikirim',
        'status',
    ];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];
}
