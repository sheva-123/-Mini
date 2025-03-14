<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $fillable = ['pertanian_id', 'penanaman_id','tanggal_pemeliharaan', 'jenis_pemeliharaan', 'biaya', 'kondisi_tanaman', 'keterangan'];
    public function pertanian()
    {
        return $this->belongsTo(Pertanian::class);
    }
    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class, 'penanaman_id');
    }
}
