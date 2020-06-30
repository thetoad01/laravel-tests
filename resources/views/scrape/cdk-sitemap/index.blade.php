@extends('layouts.app')

@section('title', 'Scrape CDK Websites')

@section('heads')
<link href="/css/addons/datatables.min.css" rel="stylesheet">
<style>
    body {
        background-color: #e0f2f1 !important;
    }
</style>
@endsection

@section('content')
@include('navs.scrape')

<div class="row teal lighten-5 py-4 h-100">

    <div class="container">
        <h1 class="text-center mt-2 mb-4">Scrape CDK Websites</h1>
    
        @include('scrape.cdk-sitemap.nav')
    
        <div class="row">
            <div class="card-body pt-0">
    
                <table id="dataTable" class="table table-hover table-bordered white">
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th class="text-center">State</th>
                            <th class="text-center">Last Updated</th>
                            <th class="text-center">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sitemaps as $sitemap)
                            <tr>
                                <td>{{ $sitemap->sitemap_url }}</td>
                                <td class="text-center">{{ $sitemap->state }}</td>
                                <td class="text-center">{{ $sitemap->updated_at }}</td>
                                <td class="text-center">{{ $sitemap->http_response_code }}</td>
                                <td class="text-right">
                                    <a href="{{ route('scrape.cdk-sitemap.edit', $sitemap->id) }}" class="btn btn-link py-1">edit</a>
                                    <a href="{{ route('scrape.cdk-sitemap.show', $sitemap->id) }}" class="btn btn-link py-1">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
    
    </div><!-- ./container -->
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="/js/addons/datatables.min.js" defer></script>
<script defer>
$(document).ready(function () {
    $('#dataTable').DataTable({
        "order": [[ 1, "asc" ]],
        "columnDefs": [{
            "targets": 5,
            "orderable": false
        }]
    });
    $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection
