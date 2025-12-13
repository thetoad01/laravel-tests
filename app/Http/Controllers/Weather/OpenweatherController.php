<?php

namespace App\Http\Controllers\Weather;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class OpenweatherController extends Controller
{
    private const CACHE_TTL = 3600; // 1 hour in seconds
    private const DEFAULT_ZIP = '49503';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zip = $this->validateZip(request()->zip ?? self::DEFAULT_ZIP);
        $endpoint = config('services.openweather.endpoint');
        $key = config('services.openweather.key');

        // Validate configuration
        if (empty($endpoint) || empty($key)) {
            return view('weather.index', [
                'zip' => $zip,
                'weather' => collect([]),
                'forcast' => collect([]),
                'error' => 'OpenWeather API configuration is missing. Please set OPENWEATHER_ENDPOINT and OPENWEATHER_KEY in your .env file.',
            ]);
        }

        // Ensure endpoint ends with a slash
        $endpoint = rtrim($endpoint, '/') . '/';

        $cacheKey = 'owapi_' . $zip;
        
        // Check if cached data exists and is valid
        $cachedData = Cache::get($cacheKey);
        if ($cachedData && !empty($cachedData['weather']) && !empty($cachedData['forcast'])) {
            $data = $cachedData;
        } else {
            // Clear invalid cache
            Cache::forget($cacheKey);
            
            // Fetch weather data from API
            $weatherData = $this->fetchWeatherData($endpoint, $key, $zip, 'weather');
            $forcastData = $this->fetchWeatherData($endpoint, $key, $zip, 'forecast');

            $data = [
                'weather' => $weatherData,
                'forcast' => $forcastData,
            ];

            // Only cache if we have valid data
            if ($weatherData && $forcastData) {
                Cache::put($cacheKey, $data, self::CACHE_TTL);
            }
        }

        return view('weather.index', [
            'zip' => $zip,
            'weather' => collect($data['weather'] ?? []),
            'forcast' => collect($data['forcast'] ?? []),
        ]);
    }

    /**
     * Fetch weather data from OpenWeather API
     *
     * @param string $endpoint
     * @param string $key
     * @param string $zip
     * @param string $type
     * @return array|null
     */
    private function fetchWeatherData(string $endpoint, string $key, string $zip, string $type): ?array
    {
        $response = Http::get($endpoint . $type, [
            'zip' => $zip . ',us',
            'units' => 'imperial',
            'appid' => $key,
        ]);

        return ($response->successful() && $response->json()) ? $response->json() : null;
    }

    /**
     * Validate and sanitize zip code
     *
     * @param string $zip
     * @return string
     */
    private function validateZip(string $zip): string
    {
        // Remove any non-numeric characters and limit to 5 digits
        $zip = preg_replace('/\D/', '', $zip);
        return substr($zip, 0, 5) ?: self::DEFAULT_ZIP;
    }

}
