@extends('layouts.app')

@section('title', 'CDK VDP Scrape Details')

@section('content')
<div class="row stylish-color-dark text-white nav">
    <nav class="nav container">
        <a href="/home" class="text-white nav-link">Home</a>
        <a href="/scrape/cdk" class="text-white nav-link">CDK Sitemap List</a>
        <a href="/scrape/vehicles" class="text-white nav-link">Scraped Vehicle List</a>
    </nav>
</div>

    <p class="text-center display-4">CDK VDP Scrape Details</p>

    <div class="text-center mb-2 text-secondary">Remaning to scrape: {{ number_format($count, 0) }}</div>

    @if($data->dealer == '')
        {{ dd($data) }}
    @endif

    <div class="container">
        <div class="h5">{{ $data->dealer }}</div>
        <div>{{ $data->url }}</div>
        <div>{{ $data->vin }}</div>
        <div>{{ $data->year }} {{ $data->make }} {{ $data->model }} {{ $data->trim }}</div>
        <div>Exterior: {{ $data->exterior_color }}</div>
        <div>Interior: {{ $data->interior_color }}</div>
        <div>Stock # {{ $data->stock_number }}</div>

        <div class="pt-4">
            <button value="Refresh Page" onClick="window.location.reload();" class="btn btn-sm btn-success">Reload Page</button>
        </div>
    </div>

{{-- {{ dd($data) }} --}}
@endsection

@section('scripts')
<script>
    setTimeout("location.reload(true);", 500);
</script>
@endsection
