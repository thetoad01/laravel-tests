<?php

namespace App\Http\Controllers\Weather;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class OpenweatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zip = request()->zip ?? '48706';
        $endpoint = config('services.openweather.endpoint');
        $key = config('services.openweather.key');

        $data = Cache::remember('owapi_' . $zip, 3600, function () use ($endpoint, &$key, &$zip) {
            // Get current weather
            $weather_result = Http::get($endpoint . 'weather', [
                'zip' => $zip . ',us',
                'units' => 'imperial',
                'appid' => $key,
            ]);

            // Get forcast data
            $forcast_result = Http::get($endpoint . 'forecast', [
                'zip' => $zip . ',us',
                'units' => 'imperial',
                'appid' => $key,
            ]);

            $output = [
                'weather' => $weather_result->status() === 200 ? $weather_result->json() : '',
                'forcast' => $forcast_result->status() === 200 ? $forcast_result->json() : '',
            ];

            return $output;
        });

        return view('weather.index', [
            'zip' => $zip,
            'weather' => collect($data['weather']),
            'forcast' => collect($data['forcast']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
