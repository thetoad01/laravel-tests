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

    @if (!$vehicle)
        <h1 class="text-danger">VDP could not be scraped!</h1>
        @if ($error)
            <div>Error: {{ $error }}</div>
        @endif
        @if ($http_status_code)
            <div>http_status_code: {{ $http_status_code }}</div>
        @endif
    @elseif (!$vehicle->url)
        <h1 class="text-danger">We have no VDP url!</h1>
    @else
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
    @endif

</div>
@endsection

@section('scripts')
<script>
    setTimeout("location.reload(true);", 3000);
</script>
@endsection
