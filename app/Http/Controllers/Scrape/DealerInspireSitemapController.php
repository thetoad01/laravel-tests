<?php

namespace App\Http\Controllers\Scrape;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;

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
        $sitemaps = DealerInspireSitemap::whereNull('deleted_at')
            ->orderBy('updated_at')
            ->get();

        return view('scrape.dealer-inspire.sitemaps.index', [
            'sitemaps' => $sitemaps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scrape.dealer-inspire.sitemaps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sitemap_url' => 'required|url',
        ]);

        $sitemap = new DealerInspireSitemap;
        // assign data
        $sitemap->sitemap_url = $validated['sitemap_url'];
        // save the data
        try {
            $sitemap->save();
        } catch (\Exception $e) {
            $errors = new MessageBag;
            // add your error messages:
            $errors->add('exists', 'XML Sitemap already exists!');

            return back()->withErrors($errors);
        }

        return redirect()->route('sitemap.dealer-inspire.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dealerInspireSitemap = DealerInspireSitemap::find($id);

        $client = new Client();

        try {
            $response = $client->request('GET', $dealerInspireSitemap->sitemap_url, ['allow_redirects' => false,'http_errors' => false]);
            $status_code = $response->getStatusCode();
        } catch (GuzzleException $e) {
            dd($e);
            // abort(404);
        }

        // write response code to database
        $dealerInspireSitemap->http_response_code = $status_code;
        $dealerInspireSitemap->save();

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

        return view('scrape.dealer-inspire.sitemaps.show', [
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
