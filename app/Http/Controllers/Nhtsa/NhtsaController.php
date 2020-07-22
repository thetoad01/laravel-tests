<?php

namespace App\Http\Controllers\Nhtsa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use GuzzleHttp\Client;
use App\Repositories\NhtsaDecodeRepository;
use App\Models\NhtsaDecoded;

class NhtsaController extends Controller
{
    public function index()
    {
        $recents = NhtsaDecoded::whereNotNull('VIN')
            ->take(10)
            ->latest()
            ->get();

        return view('nhtsa.index', [
            'recents' => $recents,
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'vin' => $id,
            'data' => '',
        ]);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vin' => 'required|size:17',
            'year' => 'required|digits:4',
        ]);

        $clientIP = $request->ip() ?? '';

        $url = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/'.$validated['vin'].'?format=json&modelyear='.$validated['year'];

        $response = Http::get($url);

        abort_if($response->failed(), 404);
        
        $data = $response->json();

        $vehicle = collect($data['Results'])->first();

        try {
            NhtsaDecoded::create([
                'clientIP' => $clientIP,
                'VIN' => $vehicle['VIN'] ?? '',
                'BodyCabType' => $vehicle['BodyCabType'] ?? '',
                'BodyClass' => $vehicle['BodyClass'] ?? '',
                'DisplacementL' => $vehicle['DisplacementL'] ?? '',
                'Doors' => $vehicle['Doors'] ?? '',
                'DriveType' => $vehicle['DriveType'] ?? '',
                'EngineConfiguration' => $vehicle['EngineConfiguration'] ?? '',
                'EngineCylinders' => $vehicle['EngineCylinders'] ?? '',
                'EngineHP' => $vehicle['EngineHP'] ?? '',
                'EngineModel' => $vehicle['EngineModel'] ?? '',
                'FuelTypePrimary' => $vehicle['FuelTypePrimary'] ?? '',
                'FuelTypeSecondary' => $vehicle['FuelTypeSecondary'] ?? '',
                'GVWR' => $vehicle['GVWR'] ?? '',
                'Make' => $vehicle['Make'] ?? '',
                'Manufacturer' => $vehicle['Manufacturer'] ?? '',
                'ManufacturerId' => $vehicle['ManufacturerId'] ?? '',
                'Model' => $vehicle['Model'] ?? '',
                'ModelYear' => $vehicle['ModelYear'] ?? '',
                'NCSABodyType' => $vehicle['NCSABodyType'] ?? '',
                'NCSAMake' => $vehicle['NCSAMake'] ?? '',
                'NCSAModel' => $vehicle['NCSAModel'] ?? '',
                'PlantCity' => $vehicle['PlantCity'] ?? '',
                'PlantCountry' => $vehicle['PlantCountry'] ?? '',
                'PlantState' => $vehicle['PlantState'] ?? '',
                'Series' => $vehicle['Series'] ?? '',
                'Series2' => $vehicle['Series2'] ?? '',
                'TransmissionSpeeds' => $vehicle['TransmissionSpeeds'] ?? '',
                'TransmissionStyle' => $vehicle['TransmissionStyle'] ?? '',
                'Trim' => $vehicle['Trim'] ?? '',
                'Trim2' => $vehicle['Trim2'] ?? '',
                'Turbo' => $vehicle['Turbo'] ?? '',
                'VehicleType' => $vehicle['VehicleType'] ?? '',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }

        $output = [
            'message' => $data['Message'],
            'errorCodes' => Str::of($vehicle['ErrorCode'])->split('/(,)+/'),
            'errorMessages' => Str::of($vehicle['ErrorText'])->split('/(; )+/'),
            'vehicle' => $vehicle,
        ];

        // return $output;

        return view('nhtsa.decoded', $output);
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

        $response = \App\Clients\NhtsaClient::handle($vin, $year);

        abort_if(!$response['successful'], 404);

        $nhtsaData = new NhtsaDecodeRepository(collect($response['data']['Results'])->first());

        return response()->json($nhtsaData->run());
    }
}
