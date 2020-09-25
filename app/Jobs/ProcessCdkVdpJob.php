<?php

namespace App\Jobs;

use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCdkVdpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $vehicle;
    protected $cdk_links_id;
    protected $response_code;

    /**
     * Create a new job instance.
     * 
     * @param collection $vehicle
     * @param int $response_code
     *
     * @return void
     */
    public function __construct($response_code, $vehicle)
    {
        $this->vehicle = $vehicle;
        $this->response_code = $response_code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // handle vehicle with no VIN
        if (!$this->vehicle['vin']) {
            return [
                'response' => $this->response_code,
                'vehicle' => $this->vehicle
            ];
        }

        $result = Vehicle::firstOrCreate(
            [
                'url' => $this->vehicle['url'],
                'vin' => $this->vehicle['vin'],
            ],
            [
                'dealer' => $this->vehicle['dealer'],
                'year' => $this->vehicle['year'],
                'make' => $this->vehicle['make'],
                'model' => $this->vehicle['model'],
                'trim' => $this->vehicle['trim'],
                'exterior_color' => $this->vehicle['exterior_color'],
                'interior_color' => $this->vehicle['interior_color'],
                'stock_number' => $this->vehicle['stock_number'],
            ]
        );

        return [
            'response' => $this->response_code,
            'vehicle' => $result
        ];
    }
}
