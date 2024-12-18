<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    protected $fillable = ['penanaman_id', 'tanggal_pemeliharaan', 'jenis_pemeliharaan', 'biaya'];
    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }
}
