@extends('layouts.app')

@section('title', 'Vehicles Scraped from CDK Websites')

@section('heads')
@endsection

@section('content')

    <h1 class="text-center mt-3">Vehicles Scraped from CDK Websites</h1>

    {{-- Pagination links --}}
    <div class="container-fluid mt-3">
        {{ $vehicles->links() }}
    </div>

    <div class="container-fluid">
        <ul class="list-group">
            @foreach ($vehicles as $vehicle)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col">
                            <span class="h5">{{ $vehicle->dealer }}</span>
                            <span class="pl-4">Stock #: {{ $vehicle->stock_number }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $vehicle->vin }}
                        </div>
                        <div class="col">
                            {{ $vehicle->year }}
                            {{ $vehicle->make }}
                            {{ $vehicle->model }}
                            {{ $vehicle->trim }}
                        </div>
                        <div class="col">
                            {{ $vehicle->exterior_color }}
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Pagination links --}}
    <div class="container-fluid mt-3">
        {{ $vehicles->links() }}
    </div>


{{-- {{ dd($vehicles) }} --}}
@endsection

@section('scripts')
@endsection
