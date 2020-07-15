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
