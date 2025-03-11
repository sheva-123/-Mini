<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penanaman extends Model
{
    protected $table = 'penanamans';

    protected $fillable = ['pertanian_id', 'tanaman_id', 'nama','tanggal_tanam', 'jumlah_tanaman', 'status'];

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

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function pemanenan()
    {
        return $this->hasMany(Pemanenan::class);
    }
}
