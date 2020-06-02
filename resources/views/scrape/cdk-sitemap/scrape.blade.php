@extends('layouts.app')

@section('title', 'Scraped CDK Sitemap Links')

@section('heads')
@endsection

@section('content')
<div class="container">
    <h1 class="text-center mt-3">Scraped CDK Sitemap Links</h1>

    @include('scrape.cdk-sitemap.nav')

    <h2 class="text-danger">This is not currently storing to the database!</h2>

    <div class="text-weight-bold mt-4"># of VDP Links: {{ $links->count() }}</div>

    <ul class="list-group mb-4">
        @foreach ($links as $link)
            <a href="{{ $link['vdp_url'] }}" class="list-group-item list-group-item-action" target="_blank">{{ $link['vdp_url'] }}</a>
        @endforeach
    </ul>
</div>
@endsection

@section('scripts')
@endsection
