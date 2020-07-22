<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class NhtsaClient
{
    /**
     * Request NHTSA endpoint for more information about the NHTSA decode visit: https://vpic.nhtsa.dot.gov/api/
     * 
     * @param string $vin
     * @param int $year
     */
    public static function handle($vin, $year)
    {
        $url = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/'.$vin.'?format=json&modelyear='.$year;

        try {
            $response = Http::get($url);
        } catch (\Throwable $th) {
            return [
                'successful' => false,
                'status' => 500,
                'data' => '',
            ];
        }

        return [
            'successful' => $response->successful(),
            'status' => $response->status(),
            'data' => $response->json(),
        ];
    }
}
