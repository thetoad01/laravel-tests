@php
$confidences = [
    'optimistic',
    'overconfident',
    'cautiously optimistic',
    'statistically convenient',
    'model-driven',
    'model-adjacent',
    'pending',
    'subject to revision',
    'beta-quality',
    'best guess',
    'educated guess',
    'algorithmically hopeful',
    'data-adjacent',
    'not guaranteed',
    'based on vibes',
    'pending atmospheric approval',
    'weather-permitting',
    'subject to wind interference',
    'humidity-influenced',
    'provisionally accurate',
    'optimistic at best',
];
@endphp

<div class="vstack gap-3">
    @foreach ($forcast['list'] as $item)
        <div class="p-3 rounded bg-black terminal-border">
            <div class="row g-3 align-items-center">

                <!-- When -->
                <div class="col-md-4 col-sm-6">
                    <div class="text-secondary small">timestamp</div>
                    <div class="fw-semibold">
                        {{ Carbon\Carbon::parse($item['dt'])->addSeconds($forcast['city']['timezone'])->format('l') }}
                    </div>
                    <div class="small text-secondary">
                        {{ Carbon\Carbon::parse($item['dt'])->addSeconds($forcast['city']['timezone'])->format('g:i A') }}
                    </div>
                    <div class="small text-info mt-1">
                        {{ $item['weather'][0]['description'] }}
                    </div>
                </div>

                <!-- Temp -->
                <div class="col-md-4 col-sm-6">
                    <div class="text-secondary small">temp</div>
                    <div class="display-6 fw-bold lh-1">
                        {{ intval($item['main']['temp']) }}°
                    </div>
                    <div class="small text-secondary">
                        feels_like: {{ intval($item['main']['feels_like']) }}°
                    </div>
                </div>

                <!-- Humidity/Wind -->
                <div class="col-md-4 col-sm-6">
                    <div class="text-secondary small">conditions</div>
                    <div class="d-flex gap-4">
                        <div>
                            <div class="fw-semibold">{{ intval($item['main']['humidity']) }}%</div>
                            <div class="small text-secondary">humidity</div>
                        </div>
                        <div>
                            <div class="fw-semibold">{{ number_format(intval($item['wind']['speed']) * 2.23694, 1) }} mph</div>
                            <div class="small text-secondary">wind</div>
                        </div>
                    </div>
                    <div class="small text-secondary mt-2">
                        confidence: {{ $confidences[array_rand($confidences)] }}
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
