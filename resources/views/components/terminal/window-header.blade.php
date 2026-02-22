@props(['path'])

<div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom border-secondary">
    <span class="badge rounded-pill text-bg-danger"> </span>
    <span class="badge rounded-pill text-bg-warning"> </span>
    <span class="badge rounded-pill text-bg-success"> </span>
    <div class="ms-2 small text-secondary">{{ Str::slug(config('app.name', 'app')) }}/{{ $path }}</div>
</div>
