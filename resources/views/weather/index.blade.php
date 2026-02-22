@extends('layouts.terminal')

@section('title', 'weather — openweather')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            {{-- Terminal Window: Current Weather --}}
            <div class="rounded bg-black terminal-border overflow-hidden shadow">
                <x-terminal.window-header path="weather-current" />

                <div class="p-4">
                    <div class="mb-3">
                        <div class="text-secondary small">module</div>
                        <h1 class="h4 mb-0">
                            <span class="text-success">$</span> current_weather
                        </h1>
                        <div class="text-secondary small mt-1">
                            because every developer builds a weather app. this is mine.
                        </div>
                    </div>

                    <hr class="my-4 border-secondary">

                    @if (isset($error))
                        <div class="alert alert-danger border-secondary bg-dark text-light small" role="alert">
                            <div class="fw-semibold mb-2">
                                <span class="text-danger">✗</span> configuration_error
                            </div>
                            {{ $error }}
                        </div>
                    @elseif (!$weather || $weather->isEmpty())
                        @include('weather.partials.no-weather')
                    @else
                        @include('weather.partials.weather')
                    @endif
                </div>
            </div>

            {{-- Terminal Window: Forecast --}}
            @if (!empty($weather) && $weather->isNotEmpty())
            <div class="rounded bg-black terminal-border overflow-hidden shadow mt-3">
                <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom border-secondary">
                    <span class="badge rounded-pill text-bg-danger"> </span>
                    <span class="badge rounded-pill text-bg-warning"> </span>
                    <span class="badge rounded-pill text-bg-success"> </span>
                    <div class="ms-2 small text-secondary">/weather/forecast</div>
                </div>

                <div class="p-4">
                    <div class="mb-3">
                        <div class="text-secondary small">module</div>
                        <h2 class="h5 mb-0">
                            <span class="text-success">$</span> forecast
                        </h2>
                        <div class="text-secondary small mt-1">
                            predicting the future with questionable confidence.
                        </div>
                    </div>

                    <hr class="my-4 border-secondary">

                    @if ($forcast->isNotEmpty())
                        @include('weather.partials.forcast')
                    @else
                        @include('weather.partials.no-forcast')
                    @endif
                </div>
            </div>
            @endif

            <div class="mt-4 small text-secondary d-flex flex-wrap justify-content-between gap-2">
                <div>source: <span class="text-info">openweather</span></div>
                <div>mode: <span class="text-warning">demo_app</span> <span class="cursor">█</span></div>
            </div>

        </div>
    </div>
</div>

{{-- Bootstrap 5 Modal: Enter zip --}}
<div class="modal fade" id="zipcodeModal" tabindex="-1" aria-labelledby="zipcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-black text-light terminal-border">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="zipcodeModalLabel">
                    <span class="text-success">$</span> set_zipcode
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('weather.index') }}" method="GET">
                <div class="modal-body">
                    <label for="zip" class="form-label text-secondary small mb-1">zip (5 digits. no letters. no drama.)</label>
                    <input type="text"
                           name="zip"
                           id="zip"
                           class="form-control bg-black text-light border-secondary"
                           maxlength="5"
                           inputmode="numeric"
                           pattern="\d{5}"
                           placeholder="zipcode">

                    <div id="zipError" class="small text-warning mt-2"></div>
                </div>

                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">close</button>
                    <button type="submit" id="zipSubmit" class="btn btn-success btn-sm text-black fw-bold" disabled>
                        apply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        const button = document.getElementById('zipSubmit');
        const input  = document.getElementById('zip');
        const error  = document.getElementById('zipError');

        if (!button || !input) return;

        const validate = () => {
            const value = (input.value || '').trim();
            const ok = /^\d{5}$/.test(value);

            button.disabled = !ok;
            if (!value) {
                error.textContent = '';
            } else if (!ok) {
                error.textContent = 'invalid input. expected exactly 5 digits.';
            } else {
                error.textContent = '';
            }
        };

        input.addEventListener('input', validate);
        validate();
    })();
</script>
@endpush
