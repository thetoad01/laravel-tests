<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name', 'Terminal'))</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('head')
</head>

<body class="bg-dark text-light scanlines d-flex flex-column min-vh-100">
<x-terminal.nav />

<main class="flex-grow-1 @yield('main_class', 'py-5')">
    @yield('content')
</main>

<x-terminal.footer>
    <a class="link-secondary text-decoration-none" href="{{ route('old-stuff') }}">old_stuff</a>
    <a class="link-secondary text-decoration-none" href="{{ route('register') }}">access</a>
    <a class="link-secondary text-decoration-none" href="#notes">notes</a>
</x-terminal.footer>

@stack('scripts')
</body>
</html>
