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
        return $this->belongsTo(Laporan::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'petani_lahan', 'pertanian_id', 'user_id');
    }
}
