@extends('layouts.app')

@section('title', 'Laravel Tests Home')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
    <div class="mt-3">
        <h1>Welcome Home!</h1>
    </div>

    <p>Question:  Can you route to something.php in Laravel? <a href="/something.php">Click here to find out!</a></p>

    <div class="card">
        <div class="card-body">
            <div class="list-group">
                <div class="list-group-item active">Scrape CDK Website(s)</div>
                <a class="list-group-item" href="/scrape/cdk">Scrape Sitemap(s)</a>
                <a class="list-group-item" href="/scrape">Scrape Vehicles</a>
                <a class="list-group-item" href="/scrape/vehicles">View Scraped Vehicles</a>
            </div>

            <div class="list-group mt-4">
                <div class="list-group-item active">Scrape Dealer Inspire Website(s)</div>
                <a class="list-group-item" href="{{ route('sitemap.dealer-inspire.index') }}">Sitemap List</a>
                <a class="list-group-item" href="{{ route('vdp.dealer-inspire.index') }}">Dealer Inspire Vehicles to Scrape</a>
                <a class="list-group-item" href="#">View Scraped Vehicles</a>
            </div>

            <div class="list-group mt-4">
                <div class="list-group-item active">Vue Component Tests</div>
                <a class="list-group-item" href="/vue-components/smooth-scrolling">Smooth Scrolling</a>
                <a class="list-group-item" href="/vue-components/context-menu">Context Menu</a>
                <a class="list-group-item" href="/vue-components/conditional-visibility">Show an element when another is hidden</a>
                <a class="list-group-item" href="/vue-components/modal">Modals</a>
                <a class="list-group-item" href="/vue-components/confirmation-button">Confirmation Button</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
