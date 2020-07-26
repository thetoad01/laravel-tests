<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class CdkVdpLinkClient
{
    /**
     * Visit CDK VDP
     * 
     * @param string $endpoint
     * 
     * @return array
     */
    public function handle($endpoint)
    {
        $response_status = 500;
        $data = null;

        try {
            $response = Http::withOptions([
                'allow_redirects' => false,
            ])->get($endpoint);
        } catch (\Throwable $e) {
            return [
                'response_code' => $response_status,
                'data' => $data,
            ];
        }

        $response_status = $response->status();

        if ($response_status != 200) {
            $data = null;
        } else {
            $data = $response->body();
        }

        return [
            'response_code' => $response_status,
            'data' => $data,
        ];
    }
}