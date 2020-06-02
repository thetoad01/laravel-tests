@extends('layouts.app')

@section('title', 'Process CDK VDPs')

@section('heads')
@endsection

@section('content')
@include('scrape.cdk-vdp.partials.nav')

<div class="container py-4">
    <div class="h5">Response Code:  {{ $response }}</div>

    <div class="card">
        <div class="card-body">
            <div>{{ $vehicle['url'] }}</div>
            <div>Dealer: {{ $vehicle['dealer'] }}</div>
            <div>
                VIN:
                @if ($vehicle['vin'])
                    {{ $vehicle['vin'] }}
                @else
                    <span class="text-danger">No VIN, vehicle was not saved to DB!</span>
                @endif
            </div>
            <div>
                Vehicle:
                {{ $vehicle['year'] }}
                {{ $vehicle['make'] }}
                {{ $vehicle['model'] }}
                {{ $vehicle['trim'] }}
            </div>
            <div>Color: {{ $vehicle['exterior_color'] }}</div>
            <div>Stock #: {{ $vehicle['stock_number'] }}</div>
        </div><!-- ./card-body -->
    </div><!-- ./card -->
</div>
@endsection

@section('scripts')
@endsection