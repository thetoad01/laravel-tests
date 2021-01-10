<?php

namespace App\Http\Controllers;

use App\Models\Covid19;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Covid19Controller extends Controller
{
    public function index()
    {
        $days = 32;

        $data = Covid19::whereDate('date', '>', Carbon::now()->subDays($days))
            ->orderByDesc('date')
            ->get();

        $confirmed = $data->pluck('confirmed', 'date');
        $deaths = $data->pluck('deaths', 'date');

        // get USA population
        $population = new \App\Clients\WorldPopulationClient;
        $population = collect($population->get());

        $us_population = isset($population['body']['population']) ? $population['body']['population'] : 331000000;

        $data = $data->each(function ($item, $key) use ($us_population, $confirmed, $deaths) {
            $yesterday = Carbon::parse($item->date)->subDay()->toDateString() ?? $item->date;

            $newConfirmed = null;
            if (isset($confirmed[$yesterday])) {
                $newConfirmed = $item->confirmed - $confirmed[$yesterday];
            }

            $newDeaths = null;
            if (isset($deaths[$yesterday])) {
                $newDeaths = $item->deaths - $deaths[$yesterday];
            }

            return [
                $item->newConfirmed = $newConfirmed,
                $item->newDeaths = $newDeaths ?? null,
                $item->avgConfirmedPerPop = $item->confirmed / $us_population * 100,
                $item->avgDeathsPerPop = $item->deaths / $us_population * 100,
                $item->avgDeathsPerConfirmed = $item->deaths / $item->confirmed * 100,
                $item->dateString = (int) Carbon::parse($item->date)->format('Ymd'),
            ];
        });

        return view('covid19.index',[
            'data' => $data->whereNotNull('newConfirmed'),
            'population' => $population->only('body')->first(),
        ]);
    }

    /**
     * Update the DB from API
     */
    public function create()
    {
        $now = now()->setTimezone('America/Detroit')->format('Ymd');
        $date = now()->setTimezone('America/Detroit')->toDateString();

        if (Cache::has('covid19'.$now)) {
            $data = Cache::get('covid-'.$now);
        } else {
            $data = $this->getCovidApi();

            Cache::put('covid-'.$now, $data, 7200);
        }
        
        $data = collect($data);

        $output = [];
        foreach ($data as $key => $value) {
            $result = Covid19::updateOrCreate(
                [
                    'country' => $value['Country'],
                    'date' => Carbon::parse($value['Date'])->toDateTime(),
                ],
                [
                    'country_code' => $value['CountryCode'],
                    'province' => $value['Province'],
                    'city' => $value['City'],
                    'city_code' => $value['CityCode'],
                    'lat' => $value['Lat'],
                    'lon' => $value['Lon'],
                    'confirmed' => $value['Confirmed'],
                    'deaths' => $value['Deaths'],
                    'recovered' => $value['Recovered'],
                    'active' => $value['Active'],
                ]
            );

            $output[] = $result;
        }

        return $output;
    }

    protected function getCovidApi()
    {
        $endpoint = 'http://api.covid19api.com/total/country/united-states';

        try {
            $result = Http::get($endpoint);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        return $result->json();
    }
}
