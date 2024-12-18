<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanian extends Model
{
    protected $fillable = [
        'nama_pertanian',
        'lokasi_pertanian',
        'luas_lahan',
    ];

    public function penanaman(){
        return $this->hasMany(Penanaman::class);
    }
    public function pemeliharaan(){
        return $this->hasMany(Pemeliharaan::class);
    }
}
