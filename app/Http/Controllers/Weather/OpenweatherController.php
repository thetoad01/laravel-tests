<?php

namespace App\Http\Controllers\Weather;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Services\WeatherService;

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
        $cache_key = 'owapi_' . $zip;

        $url = $endpoint . 'forecast?zip=' . $zip . ',us&units=imperial&appid=' . $key;
        // $url = $endpoint . 'onecall?lat=51.5085&lon=-0.1257&units=imperial&appid=' . $key;

        $data = Cache::remember($cache_key, 7200, function () use ($url) {
            $response = Http::get($url);

            if ($response->status() !== 200) {
                $data = [];
            } else {
                $data = $response->json();
            }

            return $data;
        });


        // Try this


        $response = (new WeatherService)->get('forecast', [
            'params' => [
                'zip' => $zip . ',us',
                'units' => 'imperial'
            ]
        ]);


        $city = collect($data['city']);
        $weather = collect($data['list']);

        return view('weather.index', [
            'city' => $city,
            'weather' => $weather
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
