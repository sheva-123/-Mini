<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanian extends Model
{
    protected $table = 'pertanians';

    protected $fillable = [
        'nama_pertanian',
        'lokasi_pertanian',
        'luas_lahan',
        'kondisi',
        'tanaman_id',
    ];

    public function penanaman()
    {
        return $this->hasMany(Penanaman::class);
    }

    public function pemeliharaan()
    {
        return $this->hasMany(Pemeliharaan::class);
    }

    public function pemanenan()
    {
        return $this->hasMany(pemanenan::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function tanamans()
    {
        return $this->belongsTo(Tanaman::class, 'tanaman_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'petani_lahan', 'pertanian_id', 'user_id');
    }
}
