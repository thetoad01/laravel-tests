@extends('layouts.app')

@section('title', 'Vehicles Scraped from CDK Websites')

@section('heads')
@endsection

@section('content')
<div class="row stylish-color-dark text-white nav">
    <nav class="nav container">
        <a href="/" class="text-white nav-link">Home</a>
        {{-- <a href="/cdk" class="text-white nav-link">CDK Sitemap List</a> --}}
        <a href="/vehicles" class="text-white nav-link">Scraped Vehicle List</a>
    </nav>
</div>

<div class="container">
    <a href="{{ url()->previous() }}"><i class="fas fa-arrow-circle-left"></i> back</a>
</div>

<div class="container mt-4">
    <h1 class="mb-0">Edit Scraped Vehicle</h1>
    <div class="small mb-4">(Well not really edit, but pehaps sweeten the data?)</div>

    <div class="h4">Dealership: {{ $vehicle->dealer }}</div>

    <div class="lead">
        {{ $vehicle->year }}
        {{ $vehicle->make }}
        {{ $vehicle->model }}
        @if ($vehicle->trim)
            {{ $vehicle->trim }}
        @endif
    </div>
    <div>
        Exterior Color: {{ $vehicle->exterior_color ?? '' }}
    </div>
    <div>
        Interior Color: {{ $vehicle->interior_color ?? '' }}
    </div>
    <div>
        VIN: {{ $vehicle->vin ?? '' }}
    </div>
    <div>
        Stock #: {{ $vehicle->stock_number ?? '' }}
    </div>
    <div>
        First seen: {{ \Carbon\carbon::parse($vehicle->created_at)->toFormattedDateString() ?? '' }}
    </div>
    <div class="mt-4">
        <a href="/nhtsa/decode/{{ $vehicle->vin }}/{{ $vehicle->year }}" class="btn btn-sm btn-success ml-0">Decode VIN Using NHTSA</a>
    </div>
</div>
@endsection

@section('scripts')
@endsection
