@extends('layouts.app')

@section('title', 'Vehicles Scraped from CDK Websites')

@section('heads')
@endsection

@section('content')
<div class="row stylish-color-dark text-white nav">
    <nav class="nav container">
        <a href="/" class="text-white nav-link">Home</a>
        {{-- <a href="/scrape/cdk" class="text-white nav-link">CDK Sitemap List</a> --}}
        <a href="/vehicles" class="text-white nav-link">Scraped Vehicle List</a>
    </nav>
</div>

<div class="container mt-4">
    <h1 class="mb-3">Scraped Vehicle</h1>

    <div class="h4">Dealership: {{ $vehicle->dealer }}</div>

    <div class="lead font-weight-bold">
        {{ $vehicle->year }}
        {{ $vehicle->make }}
        {{ $vehicle->model }}
        @if ($vehicle->trim)
            {{ $vehicle->trim }}
        @endif

        <a href="{{ $vehicle->url }}" target="_new" title="view vehicle page" class="btn btn-link py-0">
            <i class="fas fa-external-link-alt"></i>
            View
        </a>
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

    <div class="pt-4">
        First seen: {{ \Carbon\carbon::parse($vehicle->created_at)->toFormattedDateString() ?? '' }}
    </div>
    <div class="mt-4">
        <a href="/vehicles/{{ $vehicle->id }}/edit" class="btn btn-sm btn-info ml-0">Edit Vehicle</a>
    </div>
</div>
@endsection

@section('scripts')
@endsection
