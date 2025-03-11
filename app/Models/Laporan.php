<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['pertanian_id', 'penanaman_id', 'pemanenan_id', 'pemeliharaan_id', 'pengeluaran_id'];

    public function pertanian()
    {
        return $this->belongsTo(Pertanian::class);
    }

    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }

    public function pemeliharaan()
    {
        return $this->belongsTo(Pemeliharaan::class);
    }

    public function pemanenan()
    {
        return $this->belongsTo(Pemanenan::class);
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
}
