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
    public $incrementing = false;
    protected $fillable = [
        'id',
        'gambar_produk',
        'nama_produk',
        'harga_produk',
        'kategori_id',
        'deskripsi_produk',
        'merk_produk',
        'stok',
        'status_produk',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiModels::class, 'produk_id', 'id');
    }
}
