<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class CoinbaseClient
{
    protected $endpoint;

    public function __construct()
    {
        $this->endpoint = 'https://api.coinbase.com/v2/prices/BTC-USD/spot';
    }

    public function get()
    {
        try {
            $result = Http::get($this->endpoint);

            return $result->json();
        } catch (\Throwable $e) {
            // dd($e->getMessage());
            return null;
        }
    }
}
