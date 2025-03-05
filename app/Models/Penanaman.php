<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penanaman extends Model
{
    protected $table = 'penanamans';

    protected $fillable = ['pertanian_id', 'tanaman_id', 'tanggal_tanam', 'jumlah_tanaman'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($penanaman) {
            $penanaman->expired = Carbon::parse($penanaman->tanggal_tanam)->addDays($penanaman->tanaman->umur_panen);
        });
    }

    public function pertanian(){
        return $this->belongsTo(Pertanian::class);
    }

    public function tanaman(){
        return $this->belongsTo(Tanaman::class);
    }
}
