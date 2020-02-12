<?php

namespace App\Http\Controllers\Scrape;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// models
use App\Models\DealerInspireSitemap;
use App\Models\DealerInspireVdp;

use Carbon\Carbon;
use PHPHtmlParser\Dom;
use GuzzleHttp\Client;

class DealerInspireSitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = 'https://www.eichmotor.com/dealer-inspire-inventory/inventory_sitemap';

        $client = new Client();

        try {
            $response = $client->request('GET', $url, ['allow_redirects' => false,'http_errors' => false]);
            $status_code = $response->getStatusCode();
        } catch (GuzzleException $e) {
            dd($e);
            // abort(404);
        }

        // write response code to database

        // get body of response
        if ($status_code == 200) {
            $data = $response->getBody()->getContents();
        } else {
            abort(404);
        }

        $xml = simplexml_load_string($data);
        $sitemap_links = [];
        foreach ($xml->url as $value) {
            // $sitemap_links[] = $value->loc->__toString();
            $sitemap_links[] = DealerInspireVdp::firstOrCreate(['vdp_url' => $value->loc->__toString()]);
        }

        return response()->json([
            'links_count' => count($sitemap_links),
            'links' => $sitemap_links,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
