<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pemanenan extends Model
{
    use HasFactory;

    protected $fillable = ['pertanian_id', 'tanaman_id', 'tanggal_pemanenan', 'jumlah_hasil'];

    public function pertanian()
    {
        return $this->belongsTo(pertanian::class);
    }
}
