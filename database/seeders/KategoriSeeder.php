<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => $name = 'Pakaian & Celana', 'slug' => str($name)->slug()],
            ['name' => $name = 'Peralatan Outdoor', 'slug' => str($name)->slug()],
            ['name' => $name = 'Peralatan Keamanan', 'slug' => str($name)->slug()],
            ['name' => $name = 'Sepatu & Sendal', 'slug' => str($name)->slug()],
            ['name' => $name = 'Ransel', 'slug' => str($name)->slug()],
            ['name' => $name = 'Jaket & Jas Hujan', 'slug' => str($name)->slug()],
        ])->each(fn ($category) => Kategori::create($category));
    }
}
