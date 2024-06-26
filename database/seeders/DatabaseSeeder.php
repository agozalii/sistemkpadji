<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'nama' => 'admin',
                'username' => 'admin123',
                'role' => 'admin',
                'password' => bcrypt('123456'),
                'nomor_telpon' => '081211223355',
                'email' => 'admin@gmail.com',
                'alamat' => 'jl. Magelang KM 05'
            ],
            [
                'nama' => 'manajer',
                'username' => 'manajer123',
                'role' => 'manajer',
                'password' => bcrypt('123456'),
                'nomor_telpon' => '081211223344',
                'email' => 'manajer@gmail.com',
                'alamat' => 'Jl. Magelang KM 06'
            ],
            [
                'nama' => 'pelanggan',
                'username' => 'pelanggan123',
                'role' => 'pelanggan',
                'password' => bcrypt('123456'),
                'nomor_telpon' => '081211223344',
                'email' => 'pelanggan@gmail.com',
                'alamat' => 'Jl. Magelang KM 06'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        $this->call([
            KategoriSeeder::class,
        ]);
    }
}
