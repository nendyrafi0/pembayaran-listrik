<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    use HasFactory;

    protected $table = 'penggunaan';

    protected $primaryKey = 'id_penggunaan';

    protected $fillable = [
        'id_user',
        'bulan',
        'tahun',
        'meter_awal',
        'meter_akhir',
        'tanggal_catat',
        'dicatat_oleh',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function dicatatOleh()
    {
        return $this->belongsTo(User::class, 'dicatat_oleh', 'id_user');
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id_penggunaan', 'id_penggunaan');
    }
}
