@extends('layouts.app')

@section('title', 'Edit CDK Sitemap')

@section('heads')
<style>
    body {
        background-color: #e0f2f1 !important;
    }
</style>
@endsection

@section('content')
<div class="row teal lighten-5 py-4 h-100">
    <div class="container">
        <h1 class="text-center mt-2 mb-4">Edit CDK Sitemap</h1>
    
        @include('scrape.cdk-sitemap.nav')

        <div class="card">
            <div class="card-body">
                <form action="{{ route('scrape.cdk-sitemap.update', $sitemap->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="sitemap_url">
                            Sitemap URL
                            @error('sitemap_url')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="url" name="sitemap_url" id="sitemap_url" value="{{ old('sitemap_url') ?? $sitemap->sitemap_url }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sitemap_url">
                            Dealership State
                            @error('state')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                        @include('scrape.cdk-sitemap.partials.state-select')
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <span class="small">Note:  This will reset the response code</span>
                        <a href="{{ route('scrape.cdk-sitemap.index') }}" class="btn btn-sm btn-warning float-right">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        
    </div><!-- ./container -->
</div>
@endsection

@section('scripts')
@endsection
