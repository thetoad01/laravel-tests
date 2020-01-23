<?php

namespace App\Models\Scrape;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];

    /**
     * Get the status associated with the vehicle
     */
    public function cdkLink()
    {
        return $this->hasOne('App\Models\Scrape\CdkLink', 'vdp_url', 'url');
    }
}
