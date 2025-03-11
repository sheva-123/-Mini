<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pemanenan extends Model
{
    use HasFactory;

    protected $fillable = ['pertanian_id', 'penanaman_id', 'tanggal_pemanenan', 'jumlah_hasil', 'status_panen'];

    public function pertanian()
    {
        return $this->belongsTo(pertanian::class);
    }

    public function penanaman()
    {
        return $this->belongsTo(penanaman::class);
    }
}
