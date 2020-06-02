@extends('layouts.app')

@section('title', 'Un-Scraped CDK VDPs')

@section('heads')
@endsection

@section('content')
@include('scrape.cdk-vdp.partials.nav')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-6">
            <h3>Un-Processed CDK VDP URLs</h3>
        </div>
        <div class="col-6 text-right">
            <div class="float-right">
                {{ $links->links() }}
            </div>
        </div>
    </div>

    <table class="table table-sm table-hover mb-4">
        <thead>
            <tr>
                <th>URL</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $link)
                <tr>
                    <td>{{ $link->vdp_url }}</td>
                    <td>{{ $link->created_at }}</td>
                    <td class="text-right">
                        <a href="{{ route('scrape.cdk-vdp.show', $link->id) }}" class="btn btn-sm btn-success py-1 mr-3">Process</a>
                        <a href="{{ $link->vdp_url }}" class="btn btn-sm btn-primary py-1" target="_new">Visit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
