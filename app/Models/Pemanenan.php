<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pemanenan extends Model
{
    use HasFactory;

    protected $fillable = ['id_penanaman', 'tanggal_pemanenan', 'jumlah_hasil'];

    public function planting()
    {
        return $this->belongsTo(Penanaman::class, 'id_penanaman');
    }
}
