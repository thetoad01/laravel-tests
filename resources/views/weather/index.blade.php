@extends('layouts.app')

@section('title', 'Weather App Using Open Weather API | Laravel Tests')

@section('heads')
<style>
    body { background-color: #3e4551 !important; }
</style>
@endsection

@section('content')
<div class="unique-color row pb-4">
    <div class="container pt-4 px-sm-0">
        <h1 class="text-center text-white">Current Weather</h1>

        <div class="card">
            <div class="card-body">
                <h2>
                    {{ $weather['name'] }}
                    <button type="button" class="ml-4 btn btn-primary py-1 px-3"  data-toggle="modal" data-target="#zipcodeModal">Change</button>
                </h2>
                <div>{{ Carbon\Carbon::parse($weather['dt'])->addSeconds($weather['timezone'])->toFormattedDateString() }} {{ $weather['weather'][0]['description'] }}</div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="pt-4">
                            <span class="display-1 pl-4">{{ intval($weather['main']['temp']) }}°</span>
                            Feels like {{ intval($weather['main']['feels_like']) }}°
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col">
                                <div>
                                    {{ intval($weather['main']['temp_max']) }}°
                                </div>
                                <div>
                                    High
                                </div>
                            </div>

                            <div class="col">
                                <div>
                                    {{ intval($weather['wind']['speed']) * 2.23694 }} mph
                                </div>
                                <div>
                                    Wind
                                </div>
                            </div>

                            <div class="col">
                                <div>
                                    {{ Carbon\Carbon::parse($weather['sys']['sunrise'])->addSeconds($weather['timezone'])->format('h:i:s A') }}
                                </div>
                                <div>
                                    Sunrise
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <div>
                                    {{ intval($weather['main']['temp_min']) }}°
                                </div>
                                <div>
                                    Low
                                </div>
                            </div>

                            <div class="col">
                                <div>
                                    {{ intval($weather['main']['humidity']) }}%
                                </div>
                                <div>
                                    Humidity
                                </div>
                            </div>

                            <div class="col">
                                <div>
                                    {{ Carbon\Carbon::parse($weather['sys']['sunset'])->addSeconds($weather['timezone'])->format('h:i:s A') }}
                                </div>
                                <div>
                                    Sunset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Forcast --}}
<div class="row py-4">
    <div class="container px-sm-0">
        <h2 class="text-center text-white">Forcast</h2>

        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($forcast['list'] as $item)
                        <li class="list-group-item mb-2 hoverable">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div>{{ Carbon\Carbon::parse($item['dt'])->addSeconds($forcast['city']['timezone'])->format('l') }}</div>
                                    <div>{{ Carbon\Carbon::parse($item['dt'])->addSeconds($forcast['city']['timezone'])->format('g:i A') }}</div>
                                    <div class="font-weight-bold">{{ $item['weather'][0]['description'] }}</div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <div class="lead font-weight-bold">{{ intval($item['main']['temp']) }}°</div>
                                    <div>Feels like {{ intval($item['main']['feels_like']) }}°</div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <div class="row font-weight-light">
                                        <div class="col">
                                            <div>{{ intval($item['main']['temp_max']) }}°</div>
                                            <div>High</div>
                                        </div>
                                        <div class="col">
                                            <div>{{ intval($item['main']['temp_min']) }}°</div>
                                            <div>Low</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6">
                                    <div class="row font-weight-light">
                                        <div class="col">
                                            <div>{{ intval($item['main']['humidity']) }}%</div>
                                            <div>Humidity</div>
                                        </div>
                                        <div class="col">
                                            <div>{{ number_format(intval($item['wind']['speed']) * 2.23694, 1) }} mph</div>
                                            <div>Wind</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- Enter zip code modal --}}
<div class="modal fade" id="zipcodeModal" tabindex="-1" role="dialog" aria-labelledby="zipcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zipcodeModalLabel">Enter Zip Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('weather.index') }}" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="zip" id="zip" class="form-control" maxlength="5" placeholder="zipcode">
                    </div>
                    <div id="zipError"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" id="zipSubmit" class="btn btn-sm btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let button = document.getElementById('zipSubmit');
    let input = document.getElementById('zip');

    button.disabled = true
    input.onkeyup = updateValue;

    function updateValue(e) {
        let value = input.value;
        let len = input.value.length;
        
        if (isNaN(value) || len < 5) {
            button.disabled = true;
        } else {
            button.disabled = false;
        }
    }
</script>
@endsection
