<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    protected $table = 'waitlist_entries';

    protected $fillable = [
        'email',
        'ip_address',
    ];
}
