@extends('layouts.app')

@section('title', 'Dealer Inspire Sitemap VDP List')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
<div class="container">
    <h1 class="mt-2">Dealer Inspire Sitemap VDP List</h1>

    <div class="py-2">
        <a href="{{ route('sitemap.dealer-inspire.index') }}"><< Back</a>
    </div>

    <div class="h3">Total: {{ $links_count }}</div>

    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>URL</th>
                <th>Visited</th>
                <th class="text-right">Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <td>{{ $link->vdp_url }}</td>
                    <td>{{ $link->visited == '0' ? 'No' : 'Yes' }}</td>
                    <td class="text-right">{{ $sitemap->updated_at ?? '' }}</td>
                    <td class="text-right">
                        @if ($link->visited == '0')
                            <a href="{{ route('vdp.dealer-inspire.show', $link->id) }}" class="btn btn-sm btn-success">Scrape</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
@endsection
