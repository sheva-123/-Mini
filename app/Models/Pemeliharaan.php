<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $fillable = ['pertanian_id', 'tanggal_pemeliharaan', 'jenis_pemeliharaan', 'biaya'];
    public function pertanian()
    {
        return $this->belongsTo(pertanian::class);
    }
}
