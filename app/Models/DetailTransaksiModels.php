<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiModels extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'produk_id', 'id');
    }
    public function transaksi()
    {
        return $this->belongsTo(TransaksiModels::class, 'transaksi_id', 'id');
    }
    public function promosi()
    {
        return $this->belongsTo(PromosiModel::class, 'promosi_id', 'id');
    }
}
