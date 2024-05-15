<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'gambar_produk',
        'nama_produk',
        'harga_produk',
        'kategori_produk',
        'deskripsi_produk',
        'merk_produk',
        'status_produk',
    ];

    public function getIdAttribute($value)
    {
        // Jika format ID adalah 'PR' . rand(100, 999)
        return 'PR' . substr($value, 2); // Mengambil angka dari ID yang dihasilkan
        // return 'PR'.intval($this->faker->numberBetween(1000, 9999));
    }
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiModels::class, 'produk_id', 'id');
    }

}
