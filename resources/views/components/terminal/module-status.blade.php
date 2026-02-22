@props([
    'module',
    'status',
    'moduleClass' => 'text-info',
    'statusClass' => 'text-warning',
])

<div class="mt-3 small text-secondary d-flex flex-wrap justify-content-between gap-2" {{ $attributes }}>
    <div>module: <span class="{{ $moduleClass }}">{{ $module }}</span></div>
    <div>status: <span class="{{ $statusClass }}">{{ $status }}</span></div>
</div>
