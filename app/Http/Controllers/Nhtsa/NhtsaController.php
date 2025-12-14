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
    /**
     * Extract model year from VIN (10th character)
     * 
     * VIN year encoding:
     * - 1980-2000: A=1980, B=1981... Y=2000
     * - 2001-2009: 1=2001, 2=2002... 9=2009
     * - 2010-2030: A=2010, B=2011... Y=2030 (reuses A-Y, excludes I, O, Q, U, Z)
     * 
     * @param string $vin
     * @return int|null
     */
    private function extractYearFromVin($vin)
    {
        if (strlen($vin) < 10) {
            return null;
        }

        $yearChar = strtoupper($vin[9]); // 10th character (0-indexed: 9)
        $currentYear = (int)date('Y');

        // Handle numeric years (2001-2009)
        if (is_numeric($yearChar)) {
            return 2000 + (int)$yearChar;
        }

        // Handle letter years - need to determine which cycle (1980-2000 or 2010-2030)
        // Letters A-Y appear in both cycles, so we use context to determine
        $letterToYear1980 = [
            'A' => 1980, 'B' => 1981, 'C' => 1982, 'D' => 1983, 'E' => 1984,
            'F' => 1985, 'G' => 1986, 'H' => 1987, 'J' => 1988, 'K' => 1989,
            'L' => 1990, 'M' => 1991, 'N' => 1992, 'P' => 1993, 'R' => 1994,
            'S' => 1995, 'T' => 1996, 'V' => 1997, 'W' => 1998, 'X' => 1999,
            'Y' => 2000,
        ];

        $letterToYear2010 = [
            'A' => 2010, 'B' => 2011, 'C' => 2012, 'D' => 2013, 'E' => 2014,
            'F' => 2015, 'G' => 2016, 'H' => 2017, 'J' => 2018, 'K' => 2019,
            'L' => 2020, 'M' => 2021, 'N' => 2022, 'P' => 2023, 'R' => 2024,
            'S' => 2025, 'T' => 2026, 'V' => 2027, 'W' => 2028, 'X' => 2029,
            'Y' => 2030,
        ];

        if (!isset($letterToYear1980[$yearChar])) {
            return null; // Invalid character (I, O, Q, U, Z are not used)
        }

        // Check both cycles and return the most reasonable year
        $year1980 = $letterToYear1980[$yearChar];
        $year2010 = $letterToYear2010[$yearChar];

        // Prefer the 2010-2030 cycle if it's a reasonable year (not too far in the future)
        if ($year2010 <= $currentYear + 1) {
            return $year2010;
        }

        // Otherwise use the 1980-2000 cycle
        return $year1980;
    }

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
            'year' => 'nullable|digits:4',
        ]);

        $clientIP = $request->ip() ?? '';

        // Extract year from VIN if not provided
        $year = $validated['year'] ?? $this->extractYearFromVin($validated['vin']);
        
        if (!$year) {
            return back()->withErrors(['vin' => 'Unable to determine model year from VIN. Please provide the year manually.'])->withInput();
        }

        $url = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/'.$validated['vin'].'?format=json&modelyear='.$year;

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
     * @param int|null $year
     *
     * @return object json
     */
    public function decode($vin, $year = null)
    {
        // need to do something here to validate the params
        abort_if(!$vin, 404);
        
        // Extract year from VIN if not provided
        if (!$year) {
            $year = $this->extractYearFromVin($vin);
            abort_if(!$year, 404, 'Unable to determine model year from VIN');
        }

        $response = \App\Clients\NhtsaClient::handle($vin, $year);

        abort_if(!$response['successful'], 404);

        $nhtsaData = new NhtsaDecodeRepository(collect($response['data']['Results'])->first());

        return response()->json($nhtsaData->run());
    }

    public function update()
    {
        $test_number = 7;

        $watchs = ['BodyCabType', 'Doors'];

        $data = NhtsaDecoded::updateOrCreate(
            [
                'VIN' => 'KM8R34HE6LU051355',
            ],
            [
                'BodyCabType' => 'test'.$test_number,
                'Doors' => $test_number,
            ],
        );

        dd($data);
    }
}
