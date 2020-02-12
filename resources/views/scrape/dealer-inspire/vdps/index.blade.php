@extends('layouts.app')

@section('title', 'Dealer Inspire VPD List')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Dealer Inspire Un-Scraped VDPs</h1>
        </div>
        <div class="col-6 text-right">
            <a href="{{ url()->previous() }}" class="btn btn-link"><< back</a>
        </div>
    </div>

    <div class="h3">Total: {{ $vdp_count }}</div>

    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th></th>
                <th>URL</th>
                <th class="text-right">Res Code</th>
                <th class="text-right">Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vdps as $vdp)
                <tr>
                    <td><a href="{{ route('vdp.dealer-inspire.show', $vdp->id) }}" class="btn btn-sm btn-success">Scrape</a></td>
                    <td>{{ $vdp->vdp_url }}</td>
                    <td class="text-right">{{ $vdp->http_response_code ?? '' }}</td>
                    <td class="text-right">{{ $vdp->updated_at ?? '' }}</td>
                    <td class="text-right">
                        <a href="#" class="btn btn-sm btn-warning disabled">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
@endsection
