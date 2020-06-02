<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class CdkSitemapClient
{
    /**
     * Visit CDK Sitemap
     * 
     * @param string $endpoint
     *
     * @return array
     */
    public function handle($endpoint)
    {
        try {
            $response = Http::withOptions([
                'allow_redirects' => false,
            ])->get($endpoint);
        } catch (\Throwable $e) {
            return [
                'status' => 500,
                'data' => null,
            ];
        }

        $response_status = $response->status();

        if ($response_status != 200) {
            $data = null;
        } else {
            $xml = simplexml_load_string($response->body());

            $data = [];
            foreach ($xml->url as $value) {
                $data[] = ['vdp_url' => $value->loc->__toString()];
            }
        }

        return [
            'status' => $response_status,
            'data' => $data,
        ];
    }
}