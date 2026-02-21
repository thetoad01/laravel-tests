<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class NhtsaClient
{
    /**
     * Request NHTSA endpoint for more information about the NHTSA decode visit: https://vpic.nhtsa.dot.gov/api/
     *
     * @return array{successful: bool, status: int, data: array}
     */
    public static function handle(string $vin, ?int $year = null): array
    {
        $endpoint = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/' . rawurlencode(trim($vin));
        $params = ['format' => 'json'];

        if ($year !== null) {
            $params['modelyear'] = $year;
        }

        try {
            $response = Http::timeout(15)->get($endpoint, $params);
        } catch (\Throwable $exception) {
            return [
                'successful' => false,
                'status' => 503,
                'data' => ['Results' => []],
            ];
        }

        $data = $response->json();
        if (!is_array($data)) {
            $data = [];
        }

        if (!isset($data['Results']) || !is_array($data['Results'])) {
            $data['Results'] = [];
        }

        return [
            'successful' => $response->successful(),
            'status' => $response->status(),
            'data' => $data,
        ];
    }
}
