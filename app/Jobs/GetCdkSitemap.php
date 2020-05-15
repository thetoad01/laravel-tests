<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
// Models
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\CdkSitemap;

use GuzzleHttp\Client;

class GetCdkSitemap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CdkSitemap $CdkSitemap)
    {
        $now = now();

        // get sitemap from database
        $sitemap = CdkSitemap::whereNull('http_response_code')
            ->orWhere('http_response_code', '200')
            ->whereDate('updated_at', '!=', $now->toDateString())
            ->orderBy('updated_at')
            ->first();

        // check for sitemap
        abort_if(!$sitemap, 404);

        // Try using guzzle
        $client = new Client();
        // make try request and abort on exception
        try {
            $response = $client->request('GET', $sitemap->sitemap_url, ['allow_redirects' => false,'http_errors' => false]);
        } catch (GuzzleException $exception) {
            // write response code to the database
            $sitemap->http_response_code = '500';
            $sitemap->updated_at = $now->toDateTime();
            $sitemap->save();

            abort(404);
        }

        $status_code = $response->getStatusCode();

        // write response code to the database
        $sitemap->http_response_code = $status_code;
        $sitemap->updated_at = $now->toDateTime();
        $sitemap->save();

        // get body of response
        if ($status_code == 200) {
            $data = $response->getBody()->getContents();
        } else {
            abort(404);
        }

        // parse XML returned from GET
        $xml = simplexml_load_string($data);
        $sitemap_links = array();
        foreach ($xml->url as $value) {
            $sitemap_links[] = CdkLink::firstOrCreate(['vdp_url' => $value->loc->__toString()]);
        }

        return 'There were ' . count($sitemap_links) . ' VDP links processed!';
    }
}
