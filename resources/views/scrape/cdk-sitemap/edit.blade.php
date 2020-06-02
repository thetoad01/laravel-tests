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

                        <span class="float-right">
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSitemapModal" title="delete sitemap">Delete</button>
                            <a href="{{ route('scrape.cdk-sitemap.index') }}" class="btn btn-sm btn-warning">Cancel</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        
    </div><!-- ./container -->
</div>

<!-- Modal -->
<div class="modal fade" id="deleteSitemapModal" tabindex="-1" role="dialog" aria-labelledby="deleteSitemapModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="deleteSitemapModalLabel">Delete Sitemap</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="h4 text-danger">You are about to delete a sitemap!  Do you really want to do this?</div>
        </div>
        <div class="modal-footer">
            <form action="{{ route('scrape.cdk-sitemap.destroy', $sitemap->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger">YES, Delete</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
