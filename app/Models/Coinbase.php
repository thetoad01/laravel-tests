<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coinbase extends Model
{
    protected $guarded = [];

    protected $casts = [
        'amount' => 'float',
    ];
}
