<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pel',
        'nm_pelanggan',
        'alamat',
        'no_hp',
        'verifikasi',
        'user_id',
        'tgl_masuk',
        'bulan',
        'ktp',
        'wajah',
        'paket_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }

}
