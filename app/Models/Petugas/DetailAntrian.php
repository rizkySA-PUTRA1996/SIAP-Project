<?php

namespace App\Models\Petugas;

use Illuminate\Database\Eloquent\Model;

class DetailAntrian extends Model
{
    protected $table = 'e_resep_detail';
    protected $primaryKey = 'id_resep_detail';
    protected $fillable = [
        'id_resep',
        'kode_obat',
        'jumlah',
        'aturan_pakai',
        'total_harga',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class, 'id_resep', 'id_resep');
    }
    public function obat()
    {
        return $this->belongsTo(StokObat::class, 'kode_obat', 'kode_obat');
    }
    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class, 'id_resep', 'id_resep');
    }
    public function kategori()
    {
        return $this->hasOneThrough(
            KategoriObat::class,   // model tujuan
            StokObat::class,       // model perantara
            'kode_obat',             // foreign key di StokObat (perantara) mengacu ke DetailAntrian
            'id_kategori',         // foreign key di KategoriObat mengacu ke StokObat
            'kode_obat',             // local key di DetailAntrian
            'id_kategori'          // local key di StokObat
        );
    }
}
