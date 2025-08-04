<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifDaya extends Model
{
    use HasFactory;

    protected $table = 'tarif_daya';
    protected $primaryKey = 'id_tarif';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'daya',
        'tarif_per_kwh',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'tarif_daya_id', 'id_tarif');
    }
}
