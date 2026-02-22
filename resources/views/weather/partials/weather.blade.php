{{-- resources/views/weather/partials/weather.blade.php --}}

<div class="d-flex align-items-start justify-content-between flex-wrap gap-2 mb-2">
    <div>
        <div class="text-secondary small">location</div>
        <h2 class="h5 mb-0">
            <span class="text-success">$</span> {{ $weather['name'] }}
        </h2>
    </div>

    <button type="button"
            class="btn btn-outline-info btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#zipcodeModal">
        set_zip
    </button>
</div>

<div class="small text-secondary mb-4">
    {{ Carbon\Carbon::parse($weather['dt'])->addSeconds($weather['timezone'])->toFormattedDateString() }}
    • {{ $weather['weather'][0]['description'] }}
    <span class="cursor">█</span>
</div>

<div class="row g-3">
    <!-- Big temp -->
    <div class="col-md-4">
        <div class="p-3 rounded bg-dark terminal-border h-100">
            <div class="text-secondary small mb-1">temperature</div>
            <div class="display-5 fw-bold lh-1">
                {{ intval($weather['main']['temp']) }}°
            </div>
            <div class="small text-secondary">
                feels_like: {{ intval($weather['main']['feels_like']) }}°
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="col-md-8">
        <div class="row g-3">
            <div class="col-sm-4">
                <div class="p-3 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small">high</div>
                    <div class="fw-semibold">{{ intval($weather['main']['temp_max']) }}°</div>
                    <div class="small text-secondary">because optimism</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="p-3 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small">wind</div>
                    <div class="fw-semibold">{{ round(intval($weather['wind']['speed']) * 2.23694) }} mph</div>
                    <div class="small text-secondary">free bonus chaos</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="p-3 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small">sunrise</div>
                    <div class="fw-semibold">
                        {{ Carbon\Carbon::parse($weather['sys']['sunrise'])->addSeconds($weather['timezone'])->format('h:i A') }}
                    </div>
                    <div class="small text-secondary">system boot</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="p-3 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small">low</div>
                    <div class="fw-semibold">{{ intval($weather['main']['temp_min']) }}°</div>
                    <div class="small text-secondary">reality check</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="p-3 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small">humidity</div>
                    <div class="fw-semibold">{{ intval($weather['main']['humidity']) }}%</div>
                    <div class="small text-secondary">air = soup</div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="p-3 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small">sunset</div>
                    <div class="fw-semibold">
                        {{ Carbon\Carbon::parse($weather['sys']['sunset'])->addSeconds($weather['timezone'])->format('h:i A') }}
                    </div>
                    <div class="small text-secondary">shutdown sequence</div>
                </div>
            </div>
        </div>
    </div>
</div>
