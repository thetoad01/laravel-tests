<?php

namespace App\Http\Controllers\Scrape;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;

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
        try {
            $sitemap->save();
        } catch (\Exception $e) {
            $errors = new MessageBag;
            // add your error messages:
            $errors->add('exists', 'XML Sitemap already exists!');

            return back()->withErrors($errors);
        }


        return redirect('/scrape/cdk');
    }

    /**
     * Edit the sitemap
     */
    public function edit($id)
    {
        $data = CdkSitemap::find($id);

        return view('scrape.cdk.edit-sitemap', [
            'data' => $data,
        ]);
    }

    /**
     * Modify the sitemap
     */
    public function update($id)
    {
        $sitemap = CdkSitemap::find($id);

        $sitemap->sitemap_url = request()->sitemap_url;
        $sitemap->state = request()->state;
        $sitemap->http_response_code = 200;
        $sitemap->save();

        return redirect()->route('scrape.cdk');
    }
}
