<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealerInspireVehicle extends Model
{
    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the status associated with the vehicle
     */
    public function link()
    {
        return $this->hasOne('App\Models\DealerInspireVdp', 'vdp_url', 'url');
    }
}
