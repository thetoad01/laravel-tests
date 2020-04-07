<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{

    /**
     * @var Client $client The GuzzleHttp client.
     */
    public $client;

    /**
     * @var string $appKey The application key for the weather API.
     */
    protected $appKey;

    public function __construct()
    {
        $this->cient = new Client([
            'base_uri' => config('services.openweather.endpoint'),
        ]);

        $this->appKey = config('services.openweather.key');
    }

    /**
     * Send Request
     *
     * @param string $method The method.
     * @param string $path The path.
     * @param array $params The params.
     *
     * @return array
     */
    public function request(string $method, string $path, array $params = []) : array
    {
        $response = $this->client->request(strtoupper($method), $path, $this->addDefaultParams($params));

        return json_decode($response->getBody(), true);
    }

    /**
     * Send Get Request
     *
     * @param string $path The path.
     * @param array $param The params.
     *
     * @return ResponseInterface
     */
    public function get(string $path, array $params = []) : array
    {
        return $this->request('GET', $path, $params);
    }

    /**
     * Add default params
     * 
     * @param array $params
     * 
     * @return array
     */
    public function addDefaultParams(array $params)
    {
        if (!isset($params['query'])) {
            $params['query'] = [];
        }
        $params['query']['appid'] = $this->appKey;
    }
}
