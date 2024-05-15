<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromosiModel extends Model
{
    use HasFactory;

    protected $table = 'promosi';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'gambar_promosi',
        'nama_promosi',
        'deskripsi_promosi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function getIdAttribute($value)
    {
        // Jika format ID adalah 'PR' . rand(100, 999)
        return 'PS' . substr($value, 2); // Mengambil angka dari ID yang dihasilkan
        // return 'PS'.intval($this->faker->numberBetween(1000, 9999));

    }
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksiModels::class, 'promosi_id', 'id');
    }

    public function details(){
        return $this->hasMany(DetailPromosiModel::class, 'id_promosi', 'id_produk');
    }
}
