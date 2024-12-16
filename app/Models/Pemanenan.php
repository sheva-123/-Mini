<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pemanenan extends Model
{
    use HasFactory;

    protected $fillable = ['penanaman_id', 'tanggal_pemanenan', 'jumlah_hasil'];

    public function penanaman()
    {
        return $this->belongsTo(Penanaman::class);
    }
}
