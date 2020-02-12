@extends('layouts.app')

@section('title', 'Dealer Inspire Sitemap List')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="mt-2">Stuff Goes Here</h1>

    <div class="py-2">
        <a href="{{ route('sitemap.dealer-inspire.create') }}" class="btn btn-sm btn-primary">Add Sitemap</a>
    </div>

    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th></th>
                <th>URL</th>
                <th>State</th>
                <th class="text-right">Res Code</th>
                <th class="text-right">Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sitemaps as $sitemap)
                <tr>
                    <td><a href="{{ route('sitemap.dealer-inspire.show', $sitemap->id) }}" class="btn btn-sm btn-success">Scrape</a></td>
                    <td>{{ $sitemap->sitemap_url }}</td>
                    <td>{{ $sitemap->state ?? '' }}</td>
                    <td class="text-right">{{ $sitemap->http_response_code ?? '' }}</td>
                    <td class="text-right">{{ $sitemap->updated_at ?? '' }}</td>
                    <td class="text-right">
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('vdp.dealer-inspire.index') }}" class="btn btn-sm btn-info ml-2">Un-Scraped VDPs</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
@endsection
