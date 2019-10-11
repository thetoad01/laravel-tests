<?php

namespace App\Http\Controllers\Scrape;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// models
use App\Models\Scrape\CdkSitemap;

class CdkController extends Controller
{
    /**
     * CDK Website Scraper main page
     */
    public function index()
    {
        $sitemaps = CdkSitemap::whereNull('deleted_at')->get();

        return view('scrape.cdk.index')->with('sitemaps', $sitemaps);
    }

    /**
     * Add CDK Sitemap to scrape
     */
    public function create()
    {
        return view('scrape.cdk.create');
    }

    /**
     * Write new CDK Sitemap to database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sitemap_url' => 'required|url',
            'state' => 'required',
        ]);

        $sitemap = new CdkSitemap;
        // assign data
        $sitemap->sitemap_url = $validated['sitemap_url'];
        $sitemap->state = $validated[ 'state'];
        // save the data
        $sitemap->save();

        return redirect('/scrape/cdk');
    }
}
