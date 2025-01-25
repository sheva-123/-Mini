<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petani_Lahan extends Model
{
    protected $table = 'petani_lahan';

    protected $fillable = [
        'user_id',
        'pertanian_id',
    ];
}
