<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Terminal') }} — success</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

@php
    $data = session('success_data');
    $msg  = session('success_message');
@endphp

<body class="bg-dark text-light scanlines d-flex flex-column min-vh-100">
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

<main class="flex-grow-1 py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <div class="rounded bg-black terminal-border overflow-hidden shadow">
                    <div class="d-flex align-items-center gap-2 px-3 py-2 border-bottom border-secondary">
                        <span class="badge rounded-pill text-bg-danger"> </span>
                        <span class="badge rounded-pill text-bg-warning"> </span>
                        <span class="badge rounded-pill text-bg-success"> </span>
                        <div class="ms-2 small text-secondary">{{ Str::slug(config('app.name', 'app')) }}/success</div>
                    </div>

                    <div class="p-4">
                        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
                            <div>
                                <div class="text-secondary small mb-1">result</div>
                                <h1 class="h4 mb-0">
                                    <span class="text-success">✓</span> submission accepted
                                </h1>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/') }}" class="btn btn-outline-info btn-sm">return_home</a>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">go_back</a>
                            </div>
                        </div>

                        <hr class="my-4 border-secondary">

                        @if($data && is_array($data))
                            <div class="text-secondary small mb-2">stdout</div>

                            <div class="mb-0 text-light small lh-sm">
                                <div class="mb-2">
                                    <span class="text-success">✓</span>
                                    {{ $data['title'] ?? 'Success.' }}
                                </div>

                                @if(!empty($data['lines']) && is_array($data['lines']))
                                    @foreach($data['lines'] as $line)
                                        <div class="ps-4">{{ $line }}</div>
                                    @endforeach
                                @endif

                                @if(!empty($data['footer']))
                                    <div class="mt-3 text-secondary">
                                        {{ $data['footer'] }}
                                    </div>
                                @endif

                                <div><span class="cursor">█</span></div>
                            </div>
                        @elseif($msg)
                            <div class="text-secondary small mb-2">stdout</div>
                            <pre class="mb-0 text-light small">{!! nl2br(e($msg)) !!}<span class="cursor">█</span></pre>
                        @else
                        <div class="alert alert-warning border-secondary bg-dark mb-0">
                            <span class="text-warning">!</span> output stream empty.
                            <div class="text-secondary small mt-1">
                                nothing to display. either the signal was lost or this is a test transmission.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3 small text-secondary d-flex flex-wrap justify-content-between gap-2">
                    <div>status: <span class="text-success">200 OK</span></div>
                    <div>session: <span class="text-success">flashed</span></div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="py-4 border-top border-secondary">
    <div class="container d-flex flex-wrap justify-content-between gap-2 small text-secondary">
        <div>&copy; {{ date('Y') }} {{ config('app.name', 'Terminal') }}</div>
        <div class="d-flex gap-3">
            <a class="link-secondary text-decoration-none" href="{{ url('/') }}#preview">preview</a>
            <a class="link-secondary text-decoration-none" href="{{ url('/') }}#access">access</a>
            <a class="link-secondary text-decoration-none" href="{{ url('/') }}#notes">notes</a>
        </div>
    </div>
</footer>
</body>
</html>
