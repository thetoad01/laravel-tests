<?php

namespace App\Http\Controllers\Scrape;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use PHPHtmlParser\Dom;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

// models
use App\Models\Scrape\CdkSitemap;
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;

class HtmlParserController extends Controller
{
    public function test()
    {
        // get random link data from db
        $cdk_link_data = CdkLink::where('visited', 0)->inRandomOrder()->first();

        // check if there are any URLs left to crawl
        if (!$cdk_link_data) {
            return '<h1>You have run out of links to crawl!</h1><div><a href="/scrape/cdk">Back</a></div>';
        }

        // grab the url for the VDP
        $url = $cdk_link_data->vdp_url;

        // Try using guzzle
        $client = new Client();
        // make try request and abort on exception
        try {
            $response = $client->request('GET', $url, array('allow_redirects' => false));
        } catch(RequestException $e) {
            // dd( Psr7\str($e->getRequest()) );
            return redirect('/scrape');
        }

        // write respone code to db record
        $cdk_link_data->http_response_code = $response->getStatusCode();
        $cdk_link_data->visited = true;
        $cdk_link_data->save();

        if ($response->getStatusCode() == 200) {
            $file = $response->getBody()->getContents();
        } else {
            // abort(404);
            return redirect('/scrape');
        }

        $dom = new Dom;

        try {
            $dom->loadStr($file);
        } catch (\Throwable $th) {
            dd($th);
        }

        // If there is no VIN move on
        if (!$dom->find('span[itemprop=vehicleIdentificationNumber]', 0)) {
            // dd('there is no vehicleIdentificationNumber at ' . $url);
            return redirect('/scrape');
        }

        $vehicle = [
            'dealer' => $dom->find('meta[itemprop=name]')->content ?? '',
            'url' => $url,
            'vin' => $dom->find('span[itemprop=vehicleIdentificationNumber]')->text ?? '',
            'year' => $dom->find('span[itemprop=vehicleModelDate]')->text ?? '',
            'make' => $dom->find('span[itemprop=manufacturer]')->text ?? '',
            'model' => $dom->find('span[itemprop=model]')->text ?? '',
            'trim' => !$dom->find('span[itemprop=vehicleConfiguration]', 0) ? '' : $dom->find('span[itemprop=vehicleConfiguration]')->text,
            // 'trim' => $trim,
            'exterior_color' => $dom->find('span[itemprop=color]')->text ?? '',
            'interior_color' => $dom->find('span[itemprop=vehicleInteriorColor]')->text ?? '',
            'stock_number' => $dom->find('span[itemprop=sku]')->text ?? '',
        ];

        // insert the vehicle in db
        $result = Vehicle::create($vehicle);

        // get count from db
        $cdk_link_count = CdkLink::where('visited', 0)->count();

        // return response()->json($result);
        return view('scrape.cdk.vdp-result')->with('data', $result)->with('count', $cdk_link_count);
    }

    public function getFile($url)
    {
        $dom = new Dom;
        $dom->loadFromUrl($url);
        $html = $dom->outerHtml;

        Storage::put('/html/3423332823.html', $html);

        // $vin = $dom->find('//span[@itemprop="vehicleIdentificationNumber"]')->item(0)->nodeValue;
    }

    public function getCdkSitemap($cdk_sitemap_id)
    {
        // get sitemap from database
        $sitemap = CdkSitemap::whereNull('deleted_at')->find($cdk_sitemap_id);

        // set current timestamp
        $now = Carbon::now()->toDateTimeString();

        // dd($sitemap);

        // Try using guzzle
        $client = new Client();
        // make try request and abort on exception
        try {
            $response = $client->request('GET', $sitemap->sitemap_url);
        } catch (GuzzleException $exception) {
            // $responseBody = $exception->getResponse()->getBody(true);
            abort(404);
        }

        // write response code to the database
        $sitemap->http_response_code = $response->getStatusCode();
        $sitemap->updated_at = $now;
        $sitemap->save();

        // body of response
        if ($response->getStatusCode() == 200) {
            $data = $response->getBody()->getContents();
        } else {
            abort(404);
        }

        // dd($data);

        $xml = simplexml_load_string($data);

        // dd($xml->url[0]->loc);

        $sitemap_links = array();
        foreach ($xml->url as $value) {
            // $sitemap_links[] = ['vdp_url' => $value->loc->__toString()];
            $sitemap_links[] = CdkLink::firstOrCreate(['vdp_url' => $value->loc->__toString()]);
        }

        return 'There were ' . count($sitemap_links) . ' VDP links processed!';

        return response()->json($sitemap_links);
    }

    public function getNumberToCrawl()
    {
        // get count from db
        $cdk_link_count = CdkLink::where('visited', 0)->count();

        dd($cdk_link_count);
    }

    /**
     * Loop through all sitemaps
     */
    public function processSitemaps()
    {
        $date = Carbon::now()->toDateString();

        $sitemaps = CdkSitemap::whereNull('deleted_at')
            ->where('http_response_code', 200)
            ->whereDate('updated_at', '!=', $date)
            ->get();

        // return response()->json($sitemaps);

        $output = array();

        foreach ($sitemaps as $sitemap) {
            $output[] = $this->getCdkSitemap($sitemap->id);
        }

        return redirect('/scrape/cdk');
    }
}
