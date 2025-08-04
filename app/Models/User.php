<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'password',
        'nama',
        'role',
        'no_meter',
        'alamat',
        'tarif_daya_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Otomatis encrypt password jika diset
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function tarifDaya()
    {
        return $this->belongsTo(TarifDaya::class, 'tarif_daya_id', 'id_tarif');
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'user_id', 'id_user');
    }
}
