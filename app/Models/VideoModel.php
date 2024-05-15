<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'user_id',
        'tumbnail',
        'video',
        'judul_video',
        'deskripsi_video',
    ];
    public function getIdAttribute($value)
    {
        // Jika format ID adalah 'PR' . rand(100, 999)
        return 'VD' . substr($value, 2); // Mengambil angka dari ID yang dihasilkan
        // return 'PR'.intval($this->faker->numberBetween(1000, 9999));
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
