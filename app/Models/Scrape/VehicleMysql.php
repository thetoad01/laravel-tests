<?php

namespace App\Models\Scrape;

use Illuminate\Database\Eloquent\Model;

class VehicleMysql extends Model
{    /**
    * The connection name for the model.
    *
    * @var string
    */
   protected $connection = 'mysql';

   /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'vehicles';

    /**
     * The attributes that aren't mass assignable.
     */
    protected $guarded = ['id'];
}
