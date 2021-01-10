<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class WorldPopulationClient
{
    protected $endpoint;
    protected $rapidapiKey;
    protected $rapidapiHost;

    public function __construct()
    {
        $this->endpoint = config('services.population.endpoint');
        $this->rapidapiKey = config('services.population.key');
        $this->rapidapiHost = config('services.population.host');
    }

    public function get()
    {
        try {
            $result = Http::withHeaders([
                'x-rapidapi-key' => $this->rapidapiKey,
                'x-rapidapi-host' => $this->rapidapiHost,
                'useQueryString' => true
            ])->get($this->endpoint, [
                'country_name' => 'United States'
            ]);

            return $result->json();
        } catch (\Throwable $e) {
            // dd($e->getMessage());
            return null;
        }
    }
}
