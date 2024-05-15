<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPromosiModel extends Model
{
    use HasFactory;

    protected $table = 'detail_promosi';

    protected $guarded = ['id'];

    public function promosi(){
        return $this->belongsTo(PromosiModel::class, 'id_promosi', 'id');
    }

    public function produk(){
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id');
    }
}
