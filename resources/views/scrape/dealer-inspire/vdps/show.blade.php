@extends('layouts.app')

@section('title', 'Dealer Inspire VPD List')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
<div class="container mt-2">
    <h1>Stuff Goes Here</h1>

    <div class="py-2">
        <a href="{{ route('vdp.dealer-inspire.index') }}"><< Back</a>
    </div>

    <ul class="list-group">
        <li class="list-group-item">{{ $vehicle->url }}</li>
        <li class="list-group-item">{{ $vehicle->dealer ?? '' }}</li>
        <li class="list-group-item">{{ $vehicle->vin ?? '' }}</li>
        <li class="list-group-item">
            {{ $vehicle->year ?? '' }}
            {{ $vehicle->make ?? '' }}
            {{ $vehicle->model ?? '' }}
        </li>
        <li class="list-group-item">{{ $vehicle->name ?? '' }}</li>
        <li class="list-group-item">{{ $vehicle->exterior_color ?? '' }}</li>
        <li class="list-group-item">{{ $vehicle->stock_number ?? '' }}</li>
    </ul>

{{-- {{ dd($vehicle) }} --}}
</div>
@endsection

@section('scripts')
@endsection
