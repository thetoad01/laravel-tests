<ul class="nav mb-2">
    <li class="nav-item">
        <a href="{{ route('scrape.cdk-sitemap.index') }}" class="nav-link btn btn-sm btn-outline-success"><i class="fas fa-sitemap mr-2"></i> Sitemap Home</a>
    </li>
    {{-- <li class="nav-item">
        <a href="/scrape" class="nav-link btn btn-sm btn-success" title="add new">Run Scrape Details</a>
    </li> --}}
    <li class="nav-item">
        <a href="{{ route('scrape.cdk-sitemap.create') }}" class="nav-link btn btn-sm btn-outline-info" title="add new sitemap"><i class="fas fa-plus-circle mr-2"></i> Add Sitemap</a>
    </li>
    {{-- <li class="nav-item">
        <a href="/vehicles" class="nav-link btn btn-sm btn-primary" title="add new">View Scraped Vehicles</a>
    </li> --}}
    {{-- <li class="nav-item">
        <a href="{{ route('vehicles.deleted.index') }}" class="nav-link btn btn-sm btn-warning" title="view deleted">View Deleted Vehicles</a>
    </li> --}}
</ul>
