<?php

namespace App\Http\Controllers\Bitcoin;

use App\Clients\CoinbaseClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coinbase;

class CoinbasePriceController extends Controller
{
    public function index()
    {
        $now = now()->timestamp;

        $current_price = new CoinbaseClient;
        $current_price = $current_price->get();

        if (!$current_price) {
            return 'not able to get price from Coinbase.';
        }

        $history = Coinbase::latest()->take(25)->get();

        $twentyfour_average = $history->pluck('amount')->average();
        $twentyfour_high = $history->pluck('amount')->max();
        $twentyfour_low = $history->pluck('amount')->min();
        $twentyfour_diff = $current_price['data']['amount'] - $twentyfour_average;
        $twentyfour_hour_change = ($current_price['data']['amount'] - $twentyfour_average) / (($current_price['data']['amount'] + $twentyfour_average) / 2) * 100;

        return view('bitcoin.index',[
            'current_price' => $current_price['data'],
            'history' => $history,
            'twentyfour_average' => $twentyfour_average,
            'twentyfour_high' => $twentyfour_high,
            'twentyfour_low' => $twentyfour_low,
            'twentyfour_diff' => $twentyfour_diff,
            'twentyfour_hour_change' => $twentyfour_hour_change,
            'dates' => $history->pluck('created_at'),
        ]);
    }

    public function storeCurrentPrice()
    {
        $price = new CoinbaseClient;
        $price = $price->get();

        if (!$price) {
            return 'not able to get price from Coinbase.';
        }

        $result = new Coinbase;
        
        $result->coin = $price['data']['base'];
        $result->currency = $price['data']['currency'];
        $result->amount = floatval($price['data']['amount']);
        $result->save();

        return $result;
    }
}
