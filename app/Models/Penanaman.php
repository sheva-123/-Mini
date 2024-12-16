<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penanaman extends Model
{
    protected $fillable = ['pertanian_id', 'tanaman_id', 'tanggal_tanam', 'jumlah_tanaman'];

    public function pertanian(){
        return $this->belongsTo(Pertanian::class);
    }

    public function tanaman(){
        return $this->belongsTo(Tanaman::class);
    }

    public function pemeliharaan(){
        return $this->hasMany(Pemeliharaan::class);
    }

    
}
