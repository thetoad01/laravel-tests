<?php

namespace App\Jobs;

use App\Clients\CoinbaseClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Coinbase;

class CoinbasePricejob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $price = new CoinbaseClient;
        $price = $price->get();

        if (!$price) {
            return;
        }

        $result = new Coinbase;
        
        $result->coin = $price['data']['base'];
        $result->currency = $price['data']['currency'];
        $result->amount = floatval($price['data']['amount']);
        $result->save();
    }
}
