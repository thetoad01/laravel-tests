<?php

namespace App\Models\Fitbit;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];
}
