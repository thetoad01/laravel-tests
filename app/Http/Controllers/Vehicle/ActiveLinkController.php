<?php

namespace App\Http\Controllers\Vehicle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;
// guzzle
use GuzzleHttp\Client;
// Models
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;

class ActiveLinkController extends Controller
{
    /**
     * Check status of link to see if still active
     */
    public function check()
    {
        $date = Carbon::now()->toDateString();

        $link = CdkLink::where('visited', true)
            ->where('http_response_code', '200')
            ->whereDate('updated_at', '!=', $date)
            ->inRandomOrder()
            ->first();

        if (!$link->vdp_url) {
            abort(402, 'No more results from db.');
        }

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'Accept-Encoding' => 'gzip, deflate, br',
        ])->withOptions([
            'allow_redirects' => false,
        ])->get($link->vdp_url);

        if ($response->status() != 200) {
            // update model
            $link->http_response_code = $response->status();
            $link->updated_at = Carbon::now()->toDateTime();
            $link->save();
        }

        return response()->json([
            'ok' => $response->ok(),
            'response' => $response->status(),
            'url' => $link->vdp_url,
            'created_at' => $link->created_at,
        ]);
    }
}
