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
