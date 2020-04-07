@extends('layouts.app')

@section('title', 'Weather App Using Open Weather API | Laravel Tests')

@section('heads')
@endsection

@section('content')

    <div class="container pt-4">
        <h1>
            Weather for {{ $city['name'] }}
        </h1>

        <div class="small">
            Sunrise (local time): {{ Carbon\Carbon::parse($city['sunrise'])->addSeconds($city['timezone'])->format('g:i:s A') }}
        </div>

        <div class="small">
            Sunset (local time): {{ Carbon\Carbon::parse($city['sunset'])->addSeconds($city['timezone'])->format('g:i:s A') }}
        </div>

        <h3 class="mt-2">Forcast</h3>

        <ul class="list-group">
            @foreach ($weather as $item)
                <li class="list-group-item hoverable">
                    <div>{{ Carbon\Carbon::parse($item['dt_txt'])->addSeconds($city['timezone'])->toDayDateTimeString() }}</div>
                    <div>
                        {{ intval($item['main']['temp']) }}°
                        {{ $item['weather'][0]['description'] }}
                    </div>
                    <div>Feels Like: {{ intval($item['main']['feels_like']) }}°</div>
                    <div>Humidity: {{ intval($item['main']['humidity']) }}%</div>
                </li>
                {{ dd($item) }}
            @endforeach
        </ul>
    </div>

@endsection

@section('scripts')
@endsection
