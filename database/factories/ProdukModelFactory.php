<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukModel>
 */
class ProdukModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = 'PR'.intval($this->faker->numberBetween(100, 999));
    
        return [
            'id' => $id,
            'gambar_produk' => 'gambar.jpg',
            'nama_produk' => $this->faker->word,
            'harga_produk' => rand(1000, 10000),
            'kategori_produk' => 'tas',
            'deskripsi_produk' => $this->faker->sentence(10),
            'merk_produk' => 'consina',
            'status_produk' => 'new arrival',
        ];
    }
}
