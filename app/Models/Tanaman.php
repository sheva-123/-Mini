<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    protected $table = 'tanamans';

    protected $fillable = [
        'nama_tanaman',
        'jenis',
        'deskripsi',
        'umur_panen',
    ];

    public static function getJenisOptions()
    {
        return ['Sayuran', 'Buah', 'Herbal'];
    }

    public function penanaman(){
        return $this->hasMany(Penanaman::class);
    }

    public function pertanian(){
        return $this->hasMany(Pertanian::class);
    }

    public function pemanenan()
    {
        return $this->hasMany(Pemanenan::class);
    }
}
