@extends('layouts.app')

@section('title', 'Laravel Tests Home')

@section('heads')
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
