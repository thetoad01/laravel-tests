<?php

namespace App\Observers;

use App\Models\NhtsaDecoded;
use Illuminate\Support\Facades\Log;

class NhtsaDecodeObserver
{
    protected $watches;

    public function __construct()
    {
        $this->watches = ['BodyCabType', 'Doors'];
    }

    /**
     * Handle the nhtsa decoded "created" event.
     *
     * @param  \App\Models\NhtsaDecoded  $nhtsaDecoded
     * @return void
     */
    public function created(NhtsaDecoded $nhtsaDecoded)
    {
        //
    }

    /**
     * Handle the nhtsa decoded "updated" event.
     *
     * @param  \App\Models\NhtsaDecoded  $nhtsaDecoded
     * @return void
     */
    public function updated(NhtsaDecoded $nhtsaDecoded)
    {
        // $watchs = ['BodyCabType', 'Doors'];

        $output = [];
        foreach ($this->watches as $watch) {
            Log::info('NhtsaDecoded was updated: ' . $watch . ' : ' . $nhtsaDecoded->getOriginal($watch));
            // $output[] = [
            //     $watch => $old_values[$watch],
            // ];
        }

        // Log::info('NhtsaDecoded was updated');
    }

    /**
     * Handle the nhtsa decoded "deleted" event.
     *
     * @param  \App\Models\NhtsaDecoded  $nhtsaDecoded
     * @return void
     */
    public function deleted(NhtsaDecoded $nhtsaDecoded)
    {
        //
    }

    /**
     * Handle the nhtsa decoded "restored" event.
     *
     * @param  \App\Models\NhtsaDecoded  $nhtsaDecoded
     * @return void
     */
    public function restored(NhtsaDecoded $nhtsaDecoded)
    {
        //
    }

    /**
     * Handle the nhtsa decoded "force deleted" event.
     *
     * @param  \App\Models\NhtsaDecoded  $nhtsaDecoded
     * @return void
     */
    public function forceDeleted(NhtsaDecoded $nhtsaDecoded)
    {
        //
    }
}
