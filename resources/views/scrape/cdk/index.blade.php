@extends('layouts.app')

@section('title', 'Scrape CDK Websites')

@section('heads')
<link href="/css/addons/datatables.min.css" rel="stylesheet">
@endsection

@section('content')

    <h1 class="text-center mt-3">Scrape CDK Websites</h1>

    <ul class="nav mb-2">
        <li class="nav-item">
            <a href="/scrape" class="nav-link btn btn-sm btn-success" title="add new">Scrape Details</a>
        </li>
        <li class="nav-item">
            <a href="/scrape/sitemaps/all" class="nav-link btn btn-sm btn-secondary" title="add new">Scrape Sitemaps</a>
        </li>
        <li class="nav-item">
            <a href="/scrape/cdk/create" class="nav-link btn btn-sm btn-info" title="add new">Add New Sitemap</a>
        </li>
    </ul>

    <div class="row teal lighten-5">
        <div class="card-body">

            <table id="dataTable" class="table table-hover table-bordered white">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Link</th>
                        <th class="text-center">State</th>
                        <th class="text-center">Last Run</th>
                        <th class="text-center">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sitemaps as $sitemap)
                        <tr>
                            <td>
                                <a href="/scrape/cdk-sitemap/{{ $sitemap->id }}" target="_new">Get VDP Links <i class="fas fa-external-link-alt pl-2"></i></a>
                            </td>
                            <td>{{ $sitemap->sitemap_url }}</td>
                            <td class="text-center">{{ $sitemap->state }}</td>
                            <td class="text-center">{{ $sitemap->updated_at }}</td>
                            <td class="text-center">{{ $sitemap->http_response_code }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

{{-- {{ dd($sitemaps) }} --}}
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
