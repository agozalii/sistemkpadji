<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModels extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $guarded = [];


    public function detail()
    {
        return $this->hasMany(DetailTransaksiModels::class, 'transaksi_id', 'id');
    }


    // public function getIdAttribute($value)
    // {
    //     // Jika format ID adalah 'PR' . rand(100, 999)
    //     return 'NT' . substr($value, 2); // Mengambil angka dari ID yang dihasilkan
    // }
}
