@extends('layouts.app')

@section('title', 'Edit CDK Sitemap to Scrape')

@section('content')
    <p class="text-center">Edit CDK Sitemap to Scrape</p>

    <div class="container">
        <div class="py-2">
            <a href="{{ route('scrape.cdk') }}" class="btn btn-sm btn-info">sitemap list</a>
        </div>

        <form action="" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="sitemap_url">Sitemap Url</label>
                <input type="text" class="form-control" id="sitemap_url" name="sitemap_url" aria-describedby="sitemap url" value="{{ $data->sitemap_url }}">
            </div>

            <div class="form-group">
                <label for="state">Sitemap Url</label>
                <input type="text" class="form-control" id="state" name="state" aria-describedby="state" value="{{ $data->state }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
