<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['pertanian_id', 'tanggal_laporan', 'deskripsi'];

    public function pertanian()
    {
        return $this->belongsTo(Pertanian::class);
    }
}
