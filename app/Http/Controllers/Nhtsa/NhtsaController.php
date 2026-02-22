<?php

namespace App\Http\Controllers\Nhtsa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Clients\NhtsaClient;
use App\Repositories\NhtsaDecodeRepository;
use App\Models\NhtsaDecoded;
use Throwable;

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
    private function extractYearFromVin(string $vin): ?int
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

    /**
     * Build Eloquent attributes from decoded vehicle data.
     *
     * @param array<string, mixed> $vehicle
     * @param string $clientIp
     * @return array<string, mixed>
     */
    private function decodedAttributes(array $vehicle, string $clientIp): array
    {
        return [
            'clientIP' => $clientIp,
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
        ];
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

    public function show(string $id)
    {
        $vehicle = NhtsaDecoded::where('VIN', $id)->first();
        if (!$vehicle) {
            return redirect()->route('nhtsa.index')->withErrors(['vin' => 'Vehicle not found.']);
        }

        $output = [
            'message' => (string) ($data['Message'] ?? ''),
            'errorCodes' => Str::of((string) ($vehicle['ErrorCode'] ?? ''))->split('/(,)+/')->filter()->values(),
            'errorMessages' => Str::of((string) ($vehicle['ErrorText'] ?? ''))->split('/(; )+/')->filter()->values(),
            'vehicle' => $vehicle,
        ];

        return view('nhtsa.decoded', $output);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vin' => ['required', 'string', 'size:17'],
            'year' => ['nullable', 'integer', 'digits:4'],
        ]);

        $clientIP = $request->ip() ?? '';
        $vin = strtoupper(trim($validated['vin']));

        $vehicle = NhtsaDecoded::where('VIN', $vin)->first();
        if ($vehicle) {
            return redirect()->route('nhtsa.show', $vin);
        }

        // Extract year from VIN if not provided
        $year = isset($validated['year']) ? (int) $validated['year'] : $this->extractYearFromVin($vin);
        
        if (!$year) {
            return back()->withErrors(['vin' => 'Unable to determine model year from VIN. Please provide the year manually.'])->withInput();
        }

        $response = NhtsaClient::handle($vin, $year);
        if (!$response['successful']) {
            return back()->withErrors(['vin' => 'NHTSA lookup failed. Please try again.'])->withInput();
        }

        $data = is_array($response['data'] ?? null) ? $response['data'] : [];
        $vehicle = collect($data['Results'] ?? [])->first();

        if (!is_array($vehicle) || empty($vehicle)) {
            return back()->withErrors(['vin' => 'No vehicle data returned for that VIN/year.'])->withInput();
        }

        try {
            NhtsaDecoded::create($this->decodedAttributes($vehicle, $clientIP));
        } catch (Throwable $exception) {
            report($exception);
            return back()->withErrors(['vin' => 'Vehicle was decoded but could not be saved.'])->withInput();
        }

        $output = [
            'message' => (string) ($data['Message'] ?? ''),
            'errorCodes' => Str::of((string) ($vehicle['ErrorCode'] ?? ''))->split('/(,)+/')->filter()->values(),
            'errorMessages' => Str::of((string) ($vehicle['ErrorText'] ?? ''))->split('/(; )+/')->filter()->values(),
            'vehicle' => $vehicle,
        ];

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
    public function decode(string $vin, ?int $year = null)
    {
        $vin = strtoupper(trim($vin));
        abort_if(strlen($vin) !== 17, 422, 'VIN must be 17 characters.');
        
        // Extract year from VIN if not provided
        if ($year === null) {
            $year = $this->extractYearFromVin($vin);
            abort_if(!$year, 422, 'Unable to determine model year from VIN');
        }

        $response = NhtsaClient::handle($vin, $year);

        abort_if(!$response['successful'], 502, 'NHTSA lookup failed.');

        $vehicle = collect($response['data']['Results'] ?? [])->first();
        abort_if(!is_array($vehicle) || empty($vehicle), 422, 'No vehicle data returned for VIN/year.');

        $nhtsaData = new NhtsaDecodeRepository($vehicle);

        return response()->json($nhtsaData->run());
    }

    public function update()
    {
        $testNumber = 7;

        $data = NhtsaDecoded::updateOrCreate(
            ['VIN' => 'KM8R34HE6LU051355'],
            
            [
                'BodyCabType' => 'test' . $testNumber,
                'Doors' => $testNumber,
            ],
        );

        return response()->json([
            'message' => 'Updated test record.',
            'data' => $data,
        ]);
    }
}
