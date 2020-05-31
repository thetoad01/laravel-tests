<?php

namespace App\Http\Controllers\Scrape;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use PHPHtmlParser\Dom;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

// clients
use App\Clients\CdkVdpLinkClient;

// models
use App\Models\Scrape\CdkSitemap;
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;

class HtmlParserController extends Controller
{
    public function test()
    {
        // get random link data from db
        $cdk_link_data = CdkLink::where('visited', 0)
            ->inRandomOrder()
            ->first();

        // check if there are any URLs left to crawl
        if (!$cdk_link_data) {
            dd('You have run out of links to crawl');
        }

        // grab the url for the VDP
        $url = $cdk_link_data->vdp_url;

        $data = collect((new CdkVdpLinkClient)->handle($url));

        if (!$data['data']) {
            // record the url status
            $cdk_link_data->http_response_code = $data['response_code'];
            $cdk_link_data->visited = true;
            $cdk_link_data->save();
            
            return view('scrape.cdk.vdp-result', [
                'data' => '',
                'count', $cdk_link_count ?? 0,
                'url' => $url,
            ]);
        };

        $file = $data['data'];

        $dom = new Dom;

        try {
            $dom->loadStr($file);
        } catch (\Throwable $th) {
            // dd($th);
            dd('error');
        }

        // If there is no VIN move on
        if ($dom->find('span[itemprop=vehicleIdentificationNumber]')->count() == 0) {
            // record the url status
            $cdk_link_data->http_response_code = $data['response_code'];
            $cdk_link_data->visited = true;
            $cdk_link_data->save();

            return view('scrape.cdk.vdp-result', [
                'data' => '',
                'count', $cdk_link_count ?? 0,
                'url' => $url,
            ]);
        }

        $vehicle = [
            'dealer' => $dom->find('meta[itemprop=name]')->content ?? '',
            'url' => $url,
            'vin' => $dom->find('span[itemprop=vehicleIdentificationNumber]')->text ?? '',
            'year' => $dom->find('span[itemprop=vehicleModelDate]')->text ?? '',
            'make' => $dom->find('span[itemprop=manufacturer]')->text ?? '',
            'model' => $dom->find('span[itemprop=model]')->text ?? '',
            'trim' => !$dom->find('span[itemprop=vehicleConfiguration]', 0) ? '' : $dom->find('span[itemprop=vehicleConfiguration]')->text,
            'exterior_color' => $dom->find('span[itemprop=color]')->text ?? '',
            'interior_color' => $dom->find('span[itemprop=vehicleInteriorColor]')->text ?? '',
            'stock_number' => $dom->find('span[itemprop=sku]')->text ?? '',
        ];

        // insert the vehicle in db
        $result = Vehicle::create($vehicle);

        // get count from db
        $cdk_link_count = CdkLink::where('visited', 0)->count();

        // record the url status
        $cdk_link_data->http_response_code = $data['response_code'];
        $cdk_link_data->visited = true;
        $cdk_link_data->save();

        return view('scrape.cdk.vdp-result', [
            'data' => $result,
            'count' => $cdk_link_count
        ]);
    }

    public function getCdkSitemap($cdk_sitemap_id)
    {
        // get sitemap from database
        $sitemap = CdkSitemap::whereNull('deleted_at')->find($cdk_sitemap_id);

        // set current timestamp
        $now = Carbon::now()->toDateTimeString();

        // Try using guzzle
        $client = new Client();
        // make try request and abort on exception
        try {
            $response = $client->request('GET', $sitemap->sitemap_url, ['allow_redirects' => false,'http_errors' => false]);
            $status_code = $response->getStatusCode();
        } catch (GuzzleException $e) {
            abort(404);
        }

        // write response code to the database
        $sitemap->http_response_code = $status_code;
        $sitemap->updated_at = $now;
        $sitemap->save();

        // body of response
        if ($status_code == 200) {
            $data = $response->getBody()->getContents();
        } else {
            abort(404);
        }

        $xml = simplexml_load_string($data);

        $sitemap_links = array();
        foreach ($xml->url as $value) {
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

        $output = array();

        foreach ($sitemaps as $sitemap) {
            $output[] = $this->getCdkSitemap($sitemap->id);
        }

        return redirect('/scrape/cdk');
    }
}
