<?php

namespace App\Http\Controllers\Nhtsa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use GuzzleHttp\Client;

class NhtsaController extends Controller
{
    /**
     * Decode a vin using NHTSA
     *
     * @param string $vin
     * @param int $year
     *
     * @return object json
     */
    public function decode($vin, $year)
    {
        // need to do something here to validate the params

        // for more information about the NHTSA decode visit: https://vpic.nhtsa.dot.gov/api/
        $url = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/'.$vin.'?format=json&modelyear='.$year;

        // instantiate new Guzzle client
        $client = new Client();
        $response = $client->get($url);

        if ($response->getStatusCode() == 200) {
            $data = $response->getBody();
        } else {
            $data = 'Error getting data';
        }

        $data = json_decode($data);

        return collect($data);
    }
}
