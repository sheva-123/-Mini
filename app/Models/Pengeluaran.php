<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = ['id_pertanian', 'tanggal_pengeluaran', 'jenis_pengeluaran', 'biaya'];

    public function farm()
    {
        return $this->belongsTo(Pertanian::class, 'id_pertanian');
    }
}

