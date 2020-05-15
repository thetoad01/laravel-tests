<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// Models
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\CdkSitemap;

class CdkSitemapTestController extends Controller
{
    /**
     * get first unprocessed sitemap
     */
    public function first()
    {
        $now = now();

        // get sitemap from database
        $sitemap = CdkSitemap::whereNull('http_response_code')
            ->orWhere('http_response_code', '200')
            ->whereDate('updated_at', '!=', $now->toDateString())
            ->orderBy('updated_at')
            ->first();

        // return $sitemap->sitemap_url;
        // $url = 'https://www.brucebennettnissan.com/sitemap-inventory-cdk.xml';
        $url = $sitemap->sitemap_url;

        try {
            $response = Http::get($url);
        } catch (\Throwable $th) {
            abort(500);
        }

        // $xml = $response->body();

        return response()->json([
            'url' => $url,
            'updated_at' => $sitemap->updated_at,
            'response' => $response->status(),
            'ok' => $response->ok(),
        ]);
    }
}
