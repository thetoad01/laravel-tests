<footer class="py-4 border-top border-secondary">
    <div class="container d-flex flex-wrap justify-content-between gap-2 small text-secondary">
        <div>&copy; {{ date('Y') }} {{ config('app.name', 'Terminal') }}</div>

        @if(trim($slot))
        <div class="d-flex gap-3">
            {{ $slot }}
        </div>
        @endif
    </div>
</footer>
