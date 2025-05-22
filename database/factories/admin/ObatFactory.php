<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Obat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObatFactory extends Factory
{
    protected $model = Obat::class;

    public function definition(): array
    {
        return [
            'kode_obat' => strtoupper($this->faker->bothify('OB###')),
            'nama_obat' => $this->faker->word(),
            'bentuk_satuan' => $this->faker->randomElement(['Tablet', 'Kapsul', 'Sirup']),
            'stok' => $this->faker->numberBetween(0, 100),
            'harga' => $this->faker->randomFloat(2, 1000, 100000),
            'kadaluarsa' => $this->faker->date(),
            'id_kategori' => 1,
        ];
    }
}
