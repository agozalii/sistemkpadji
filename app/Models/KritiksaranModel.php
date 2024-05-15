<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritiksaranModel extends Model
{
    use HasFactory;
    protected $table = 'kritiksaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'email',
        'no_telpom',
        'pesan',
    ];
}
