@extends('layouts.terminal')

@section('title', 'decode_vin_details — NHTSA')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <!-- Terminal Window -->
            <div class="rounded bg-black terminal-border overflow-hidden shadow">
                <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom border-secondary">
                    <span class="badge rounded-pill text-bg-danger"> </span>
                    <span class="badge rounded-pill text-bg-warning"> </span>
                    <span class="badge rounded-pill text-bg-success"> </span>
                    <div class="ms-2 small text-secondary">/nhtsa/{{ $vehicle['VIN'] ?? 'record' }}</div>

                    <div class="ms-auto d-flex gap-2">
                        <a href="{{ route('nhtsa.index') }}" class="btn btn-outline-info btn-sm">decode_another</a>
                    </div>
                </div>

                <div class="p-4">
                    <div class="mb-3">
                        <div class="font-monospace mb-3">
                            <span class="text-success">$</span> decode_vin {{ $vehicle['VIN'] }}
                        </div>
                        <div class="text-secondary small">result</div>
                        <h1 class="h4 mb-0">
                            <span class="text-success">✓</span> vin_decode_details
                        </h1>
                        <div class="text-secondary small mt-1">
                            turning 17 characters into a personality profile for your car.
                        </div>
                    </div>

                    <!-- Message -->
                    @if ($message)
                        <div class="alert alert-info border-secondary bg-dark text-light small mb-4">
                            <span class="text-info">i</span> {{ $message }}
                        </div>
                    @endif

                    <!-- Errors -->
                    @if ($errorMessages && $errorMessages->isNotEmpty())
                        <div class="alert alert-warning border-secondary bg-dark text-light small mb-4">
                            <div class="mb-2"><span class="text-warning">!</span> warnings returned</div>
                            <ul class="mb-0 ps-3">
                                @foreach ($errorMessages as $item)
                                    <li class="py-1">{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <hr class="border-secondary my-4">

                    <!-- Vehicle Summary -->
                    <div class="rounded bg-dark terminal-border p-3 mb-4">
                        <div class="text-secondary small">vehicle</div>
                        <div class="fw-semibold">
                            {{ $vehicle['Make'] ?? '' }}
                            {{ $vehicle['Model'] ?? '' }}
                            @if (!empty($vehicle['Series'])) {{ $vehicle['Series'] }} @endif
                            @if (!empty($vehicle['Series2'])) {{ $vehicle['Series2'] }} @endif
                            @if (!empty($vehicle['Trim'])) {{ $vehicle['Trim'] }} @endif
                            @if (!empty($vehicle['Trim2'])) {{ $vehicle['Trim2'] }} @endif
                        </div>
                        <div class="small text-secondary mt-1">
                            source: NHTSA. accuracy: as reported. blame: transferable.
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="row g-3 small">

                        <div class="col-12 col-md-6">
                            <div class="p-3 rounded bg-black terminal-border h-100">
                                <div class="text-secondary small mb-1">body</div>
                                <div><span class="text-secondary">type:</span> {{ $vehicle['NCSABodyType'] ?? '—' }}</div>
                                @if (!empty($vehicle['BodyCabType']))
                                    <div><span class="text-secondary">cab:</span> {{ $vehicle['BodyCabType'] }}</div>
                                @endif
                                <div><span class="text-secondary">class:</span> {{ $vehicle['BodyClass'] ?? '—' }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="p-3 rounded bg-black terminal-border h-100">
                                <div class="text-secondary small mb-1">drivetrain</div>
                                <div><span class="text-secondary">drive:</span> {{ $vehicle['DriveType'] ?? '—' }}</div>
                                <div>
                                    <span class="text-secondary">trans:</span>
                                    @if (!empty($vehicle['TransmissionSpeeds']))
                                        {{ $vehicle['TransmissionSpeeds'] }}-speed
                                    @elseif (!empty($vehicle['TransmissionStyle']))
                                        {{ $vehicle['TransmissionStyle'] }}
                                    @else
                                        —
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="p-3 rounded bg-black terminal-border h-100">
                                <div class="text-secondary small mb-1">engine</div>
                                <div>
                                    <span class="text-secondary">spec:</span>
                                    @php
                                        $engineParts = [];
                                        if (!empty($vehicle['DisplacementL'])) $engineParts[] = $vehicle['DisplacementL'].'L';
                                        if (!empty($vehicle['EngineCylinders'])) $engineParts[] = $vehicle['EngineCylinders'].'-cyl';
                                        if (!empty($vehicle['EngineConfiguration'])) $engineParts[] = $vehicle['EngineConfiguration'];
                                        if (($vehicle['Turbo'] ?? null) === 'Yes') $engineParts[] = 'turbo';
                                    @endphp
                                    {{ count($engineParts) ? implode(' ', $engineParts) : '—' }}
                                </div>
                                <div>
                                    <span class="text-secondary">fuel:</span>
                                    {{ $vehicle['FuelTypePrimary'] ?? '—' }}
                                </div>
                                @if (!empty($vehicle['FuelTypeSecondary']))
                                    <div>
                                        <span class="text-secondary">fuel2:</span>
                                        {{ $vehicle['FuelTypeSecondary'] }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="p-3 rounded bg-black terminal-border h-100">
                                <div class="text-secondary small mb-1">origin</div>
                                <div>
                                    <span class="text-secondary">plant:</span>
                                    {{ $vehicle['PlantCity'] ?? '—' }}@if(!empty($vehicle['PlantCity'])),@endif
                                    {{ $vehicle['PlantState'] ?? '' }}
                                    {{ $vehicle['PlantCountry'] ?? '' }}
                                </div>
                                <div class="text-secondary small mt-2">
                                    yes, this is the part everyone argues about in comments.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 small text-secondary d-flex flex-wrap justify-content-between gap-2">
                        <div>mode: <span class="text-warning">read_only</span></div>
                        <div>signal: <span class="text-success">decoded</span> <span class="cursor">█</span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
