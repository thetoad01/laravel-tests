<?php

namespace App\Http\Controllers\Nhtsa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use GuzzleHttp\Client;
use App\Repositories\NhtsaDecodeRepository;

class NhtsaController extends Controller
{
    public function index()
    {
        return view('nhtsa.index');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vin' => 'required|size:17',
            'year' => 'required|digits:4',
        ]);

        $url = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/'.$validated['vin'].'?format=json&modelyear='.$validated['year'];

        $response = Http::get($url);

        abort_if($response->failed(), 404);
        
        $data = $response->json();

        $vehicle = collect($data['Results'])->first();
        // dd($results);

        $output = [
            'message' => $data['Message'],
            'errorCodes' => Str::of($vehicle['ErrorCode'])->split('/(,)+/'),
            'errorMessages' => Str::of($vehicle['ErrorText'])->split('/(; )+/'),
            'vehicle' => $vehicle,
        ];

        return $output;
    }

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
        abort_if(!$vin, 404);
        abort_if(!$year, 404);

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

        dd(collect($data->Results)->first());

        $nhtsaData = new NhtsaDecodeRepository($data);

        // return collect($data);
        return response()->json($nhtsaData->run());
    }
}
