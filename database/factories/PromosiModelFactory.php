<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PromosiModel>
 */
class PromosiModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = 'PS'.intval($this->faker->numberBetween(100, 999));

        return [
            'id' => $id,
            'gambar_promosi' => 'gambar.jpg',
            'nama_promosi' => $this->faker->word,
            'deskripsi_promosi' => $this->faker->sentence(10),
            'tanggal_mulai' => $this->faker->date('Y-m-d'),
            'tanggal_selesai' => $this->faker->date('Y-m-d'),
        ];
    }
}
