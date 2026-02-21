<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Terminal') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="bg-dark text-light scanlines">
<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-secondary">
    <div class="container py-2">
        <a class="navbar-brand fw-semibold" href="#">
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

<header class="py-5">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="mb-3">
                    <span class="badge text-bg-success me-2">LIVE</span>
                    <span class="badge text-bg-dark border border-secondary">build: v0.0.x</span>
                    <span class="badge text-bg-dark border border-secondary">mode: testing</span>
                </div>

                <h1 class="display-5 fw-bold lh-1">
                    <span class="text-success">[</span> new system online <span class="text-success">]</span>
                </h1>

                <p class="lead text-secondary mt-3 mb-4">
                    No marketing pages. No noise.<br class="d-none d-md-block">
                    Just a clean interface for people who ship.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="#access" class="btn btn-success text-black fw-bold">
                        get_access
                    </a>
                    <a href="#preview" class="btn btn-outline-info">
                        view_preview
                    </a>
                    <a href="#notes" class="btn btn-outline-secondary">
                        read_notes
                    </a>
                </div>

                <div class="row g-3 mt-4" id="notes">
                    <div class="col-md-4">
                        <div class="p-3 rounded bg-black terminal-border">
                            <div class="text-secondary small">module</div>
                            <div class="fw-semibold text-success">focus</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded bg-black terminal-border">
                            <div class="text-secondary small">module</div>
                            <div class="fw-semibold text-success">ops</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded bg-black terminal-border">
                            <div class="text-secondary small">module</div>
                            <div class="fw-semibold text-success">vault</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- “Terminal window” preview --}}
            <div class="col-lg-5" id="preview">
                <div class="rounded bg-black terminal-border overflow-hidden shadow">
                    <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom border-secondary">
                        <span class="badge rounded-pill text-bg-danger"> </span>
                        <span class="badge rounded-pill text-bg-warning"> </span>
                        <span class="badge rounded-pill text-bg-success"> </span>
                        <div class="ms-2 small text-secondary">/var/www/{{ Str::slug(config('app.name', 'app')) }}/preview</div>
                    </div>

                    <div class="p-3">
                        <div class="text-secondary small mb-2">boot sequence</div>

                        <pre class="mb-0 text-light small">
<span class="text-success">✓</span> loading modules...
<span class="text-success">✓</span> hardening surface...
<span class="text-success">✓</span> warming cache...
<span class="text-success">✓</span> opening channel: <span class="text-info">early-access</span>
—
type <span class="text-warning">request_access</span> to get an invite<span class="cursor">█</span>
                        </pre>
                    </div>
                </div>

                <div class="mt-3 small text-secondary">
                    tip: keep it minimal. ship it sharp.
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5" id="access">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <h2 class="h4 fw-bold mb-2">
                    <span class="text-success">$</span> request_access
                </h2>
                <p class="text-secondary mb-0">
                    Drop an email. You’ll get a single message when invites open.
                </p>
            </div>

            <div class="col-lg-6">
                <form class="row g-2" action="#" method="post">
                    {{-- Wire later: action="{{ route('waitlist.store') }}" --}}
                    {{-- @csrf --}}
                    <div class="col-12 col-md">
                        <input type="email" class="form-control bg-black text-light border-secondary"
                               placeholder="you@domain.com" required>
                    </div>
                    <div class="col-12 col-md-auto">
                        <button type="submit" class="btn btn-success text-black fw-bold w-100">
                            submit
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="form-text text-secondary">
                            no spam. no drip. one ping.
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-5 border-secondary">

        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-4 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small mb-1">signal</div>
                    <div class="fw-semibold">high</div>
                    <div class="text-secondary small mt-2">less UI. more intent.</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small mb-1">latency</div>
                    <div class="fw-semibold">low</div>
                    <div class="text-secondary small mt-2">fast paths only.</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded bg-black terminal-border h-100">
                    <div class="text-secondary small mb-1">noise</div>
                    <div class="fw-semibold">none</div>
                    <div class="text-secondary small mt-2">no feeds. no fluff.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-4 border-top border-secondary">
    <div class="container d-flex flex-wrap justify-content-between gap-2 small text-secondary">
        <div>&copy; {{ date('Y') }} {{ config('app.name', 'Terminal') }}</div>
        <div class="d-flex gap-3">
            <a class="link-secondary text-decoration-none" href="#oldstuff">old-stuff</a>
            <a class="link-secondary text-decoration-none" href="#access">access</a>
            <a class="link-secondary text-decoration-none" href="#notes">notes</a>
        </div>
    </div>
</footer>

</body>
</html>
