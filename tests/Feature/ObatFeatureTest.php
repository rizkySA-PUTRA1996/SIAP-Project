<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Admin\Obat;
use App\Models\Admin\KategoriObat;

class ObatFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_obat_menampilkan_data_dari_database()
    {
        KategoriObat::create([
            'id_kategori' => 1,
            'nama_kategori' => 'Obat Bebas',
        ]);

        $obat = Obat::factory()->create([
            'id_kategori' => 1,
            'nama_obat' => 'Paracetamol',
        ]);

        // Request halaman obat
        $response = $this->get('/admin/obat');

        $response->assertStatus(200);

        $response->assertSee('Paracetamol');
    }
}
