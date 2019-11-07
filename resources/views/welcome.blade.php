<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="This is a website for Michigan developer David Defoe used for testing Laravel.">
<title>A4F5.com Homepage</title>
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/cover.css">
<style>
.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}
</style>
</head>
<body>
<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">A4F5</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="/vehicles">Vehicles</a>
                {{-- <a class="nav-link" href="#">Contact</a> --}}
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover text-center">
        <h1 class="cover-heading">Welcome To Our Corner of the Web</h1>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum inventore mollitia aliquam molestias ipsam at, ea earum explicabo repellat quisquam quo numquam rem maxime nulla sit, molestiae voluptatum, facilis distinctio?</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-outline-warning waves-effect" title="This button doesn't go anywhere!">Learn more</a>
        </p>
    </main>

    <footer class="mastfoot mt-auto text-center">
        <div class="inner">
            <p>Created by <a href="http://defoenet.com/">David Defoe</a> &copy; {{ now()->year }}</p>
        </div>
    </footer>
</div>
</body>
</html>
