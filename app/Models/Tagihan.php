<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan';

    protected $primaryKey = 'id_tagihan';

    protected $fillable = [
        'id_penggunaan',
        'jumlah_meter', // pastikan ini sama dengan migration, kalau pakai total_kwh maka ubah juga di sini
        'jumlah_tagihan',
        'status',
    ];

    public function penggunaan()
    {
        return $this->belongsTo(\App\Models\Penggunaan::class, 'id_penggunaan', 'id_penggunaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_tagihan', 'id_tagihan');
    }
}
