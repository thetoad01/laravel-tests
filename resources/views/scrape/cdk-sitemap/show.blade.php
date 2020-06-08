@extends('layouts.app')

@section('title', 'Scrape CDK Sitemap')

@section('heads')
<link href="/css/addons/datatables.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1 class="text-center mt-3">Scrape CDK Sitemap</h1>

    @include('scrape.cdk-sitemap.nav')

    <div class="row teal lighten-5">
        <div class="card-body">
            <div class="h5">{{ $sitemap->sitemap_url }}</div>
            <div>Dealership State: {{ $sitemap->state }}</div>
            <div>Last Response Code: {{ $sitemap->http_response_code }}</div>
            <div>Last updated: {{ $sitemap->updated_at }}</div>

            <div class="pt-4">
                <a href="{{ route('scrape.cdk-sitemap.scrape', $sitemap->id) }}" class="btn btn-sm btn-success">Get Links</a>
                <a href="{{ $sitemap->sitemap_url }}" class="btn btn-sm btn-info" target="_blank">Visit <i class="fas fa-external-link-alt ml-2"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
