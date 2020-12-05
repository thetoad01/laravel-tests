<?php

namespace App\Http\Controllers\Scrape;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrape\CdkSitemap;
use App\Models\Scrape\CdkLink;

class CdkSitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitemaps = CdkSitemap::whereNull('deleted_at')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('scrape.cdk-sitemap.index', [
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
        return view('scrape.cdk-sitemap.create');
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
            'state' => 'required',
        ]);

        $sitemap = new CdkSitemap;

        $sitemap->sitemap_url = trim($validated['sitemap_url']);
        $sitemap->state = trim($validated['state']);
        $sitemap->save();

        return redirect()->route('scrape.cdk-sitemap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sitemap = CdkSitemap::find($id);

        return view('scrape.cdk-sitemap.show', [
            'sitemap' => $sitemap,
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
        $sitemap = CdkSitemap::find($id);

        return view('scrape.cdk-sitemap.edit', [
            'sitemap' => $sitemap,
        ]);
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
        $validated = $request->validate([
            'sitemap_url' => 'required|url',
            'state' => 'required',
        ]);

        $sitemap = CdkSitemap::find($id);

        $sitemap->sitemap_url = $validated['sitemap_url'];
        $sitemap->state = $validated['state'];
        $sitemap->http_response_code = null;
        $sitemap->save();

        return redirect()->route('scrape.cdk-sitemap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sitemap = CdkSitemap::destroy($id);
        
        return redirect()->route('scrape.cdk-sitemap.index');
    }

    /**
     * Scrape links from sitemap
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function scrape($id)
    {
        $data = (new \App\Clients\CdkSitemapClient)->handle('https://www.ujchevy.com/sitemap-inventory-sincro.xml');

        if (!$data['data']) {
            dd('no data');
        }

        $sitemap = CdkSitemap::find($id);

        $data = (new \App\Clients\CdkSitemapClient)->handle($sitemap->sitemap_url);

        // update CdkSitemap
        $sitemap->http_response_code = $data['status'];
        $sitemap->updated_at = now()->toDateTimeString();
        $sitemap->save();

        // need to update or create vdp links to CdkLink model
        $output = [];
        foreach ($data['data'] as $key => $value) {
            $output[] = CdkLink::firstOrCreate($value);
        }

        return view('scrape.cdk-sitemap.scrape', [
            'links' => collect($output),
        ]);
    }
}
