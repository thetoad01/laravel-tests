<?php

namespace App\Services\Scrape;

use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;
use App\Clients\CdkVdpLinkClient;
use App\Helpers\ParseCdkVdpHelper;

class ProcessCdkVdp
{
    public $link_id;
    public $url;

    public function __construct($id, $url)
    {
        $this->link_id = $id;
        $this->url = $url;
    }

    /**
     * Make request to server and process results
     * 
     * @return array
     */
    public function handle()
    {
        // visit url
        $data = collect((new CdkVdpLinkClient)->handle($this->url));

        if (!$data['data']) {
            $this->updateLink($data['response_code']);

            return $this->errorResponse($data['response_code']);
        }

        $vehicle = (new ParseCdkVdpHelper)->handle($this->url, $data['data']);

        $this->updateLink($data['response_code']);

        if ($vehicle['vin']) {
            $this->saveVehicle($vehicle);
        }

        return [
            'url' => $this->url,
            'http_response_code' => $data['response_code'],
            'data' => $vehicle,
        ];
    }

    /**
     * Mark VDP link as visited and record response code
     * 
     * @param int $response
     */
    protected function updateLink($response)
    {
        $link = CdkLink::find($this->link_id);

        $link->http_response_code = $response;
        $link->visited = true;
        $link->save();
    }

    /**
     * Save vehicle
     * 
     * @param array $vehicle
     * 
     * @return collection
     */
    protected function saveVehicle($vehicle)
    {
        $result = Vehicle::firstOrCreate(
            [
                'url' => $this->url,
                'vin' => $vehicle['vin'],
            ],
            [
                'dealer' => $vehicle['dealer'],
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'trim' => $vehicle['trim'],
                'exterior_color' => $vehicle['exterior_color'],
                'interior_color' => $vehicle['interior_color'],
                'stock_number' => $vehicle['stock_number'],
            ]
        );

        return $result;
    }

    /**
     * Format error response
     */
    protected function errorResponse($response)
    {
        return [
            'url' => $this->url,
            'http_response_code' => $response,
            'data' => null,
        ];
    }
}