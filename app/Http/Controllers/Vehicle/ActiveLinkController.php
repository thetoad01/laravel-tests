<?php

namespace App\Http\Controllers\Vehicle;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
// guzzle
use GuzzleHttp\Client;
// Models
use App\Models\Scrape\CdkLink;

class ActiveLinkController extends Controller
{
    /**
     * Check status of link to see if still active
     */
    public function check()
    {
        dd(now()->toDateString());

        $date = Carbon::now()->toDateString();

        $link = CdkLink::where('visited', true)
            ->where('http_response_code', '200')
            ->whereDate('updated_at', '!=', $date)
            ->inRandomOrder()
            ->first();

        // return $link;

        if (!$link->vdp_url) {
            abort(402, 'No more results from db.');
        }

        // Try using guzzle
        $client = new Client();
        // make try request and abort on exception
        try {
            $response = $client->request('GET', $link->vdp_url, array('allow_redirects' => false));
            // $response = $client->head($vehicle->url);
        } catch(RequestException $e) {
            // dd( Psr7\str($e->getRequest()) );
            abort(406, "Error while getting link.");
        }

        // dd($response->getStatusCode());
        $http_response_code = $response->getStatusCode();

        // $cdkLink = CdkLink::find($link->id);
        // update model
        $link->http_response_code = $http_response_code;
        $link->updated_at = Carbon::now()->toDateTime();
        $link->save();

        return response()->json($link);
    }
}
