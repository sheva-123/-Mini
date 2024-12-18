<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['pertanian_id', 'tanggal_pengeluaran', 'jenis_pengeluaran', 'biaya'];

    public function pertanian()
    {
        return $this->belongsTo(Pertanian::class);
    }
}

