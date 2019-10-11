<?php

namespace App\Models\Processpro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InventoryModel extends Model
{
    protected $guarded = [];

    /**
     * The connection name for the model.
     */
    protected $connection = 'pgsql';

    /**
     * The table associated with the model.
     */
    protected $table = 'processpro_inventory';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the ID.
     */
    protected $keyType = 'string';

    /**
     * Let Eloquent now that the IDs are no incrementing
     */
    public $incrementing = false;

    /**
     * Generate UUID on boot
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Str::uuid());
        });
    }
}
