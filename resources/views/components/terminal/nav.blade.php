<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-secondary">
    <div class="container py-2">
        <a class="navbar-brand fw-semibold" href="{{ url('/') }}">
            <span class="text-success">root</span><span class="text-secondary">@</span>{{ config('app.name', 'terminal') }}<span class="text-secondary">:</span><span class="text-info">~</span><span class="text-secondary">$</span>
        </a>

        <div class="ms-auto d-flex gap-2">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-success btn-sm">enter</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">login</a>
                <a href="{{ route('register') }}" class="btn btn-success btn-sm text-black fw-bold">request_access</a>
            @endauth
        </div>
    </div>
</nav>
