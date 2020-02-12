@extends('layouts.app')

@section('title', 'Dealer Inspire Add Sitemap')

@section('heads')
<meta name="robots" content="noindex,nofollow">
@endsection

@section('content')
    <div class="container my-2">
        <h1>Add Sitemap URL</h1>



        <form action="{{ route('sitemap.dealer-inspire.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="sitemapUrl">Sitemap URL</label>
                <input type="text" class="form-control" name="sitemap_url">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </div>
        </form>

        @if ($errors->all())
            <ul class="list-unstyled alert alert-danger">
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

@section('scripts')
@endsection
