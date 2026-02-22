@extends('layouts.terminal')

@section('title', config('app.name', 'Terminal').' — old_stuff')

@section('content')
<div class="container">
    <div class="row g-4">

        <!-- Header -->
        <div class="col-12">
            <div class="mb-3">
                <div class="text-secondary small">directory</div>
                <h1 class="h4 mb-0">
                    <span class="text-success">$</span> ls -la /old_stuff
                </h1>
                <div class="text-secondary small mt-1">
                    legacy endpoints. maintained by spite and caffeine.
                </div>
            </div>
            <hr class="border-secondary">
        </div>

        <!-- 1) Bitcoin Price -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('bitcoin-price.index') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">bitcoin_price</div>
                    <div class="small text-secondary">
                        price history tooling.<br>
                        charts, tables, questionable optimism.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        <!-- 2) Weather -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('weather.index') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">weather</div>
                    <div class="small text-secondary">
                        every developer builds one.<br>
                        some of us just admit it.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        <!-- 3) Decode A VIN (NHTSA) -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('nhtsa.index') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">decode_a_vin</div>
                    <div class="small text-secondary">
                        NHTSA VIN decode.<br>
                        turns 17 chars into facts.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        <!-- 4) Tailwind CSS -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('tailwind.index') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">tailwind_css</div>
                    <div class="small text-secondary">
                        styling experiments.<br>
                        yes, it&#039;s ironic.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

    </div>

    <x-terminal.module-status module="legacy" status="acceptable" module-class="text-info" status-class="text-warning" />
</div>
@endsection
