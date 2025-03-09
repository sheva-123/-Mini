<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['pertanian_id', 'penanaman_id', 'tanggal_pengeluaran', 'jenis_pengeluaran', 'biaya'];

    protected $casts = [
        'pertanian_id' => 'integer',
        'penanaman_id' => 'integer',
        'biaya' => 'integer',
    ];

    public function pertanian()
    {
        return $this->belongsTo(Pertanian::class);
    }

    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }
}

