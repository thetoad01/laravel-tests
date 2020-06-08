@extends('layouts.app')

@section('title', 'Fitbit Activity Data')

@section('content')
<div class="container my-4">
    <h1 class="mb-3">Fitbit Activity Data</h1>

    <div class="row mb-5">
        <div class="col-4">
            <div class="list-group">
                <a href="{{ route('fitbit.activity.create') }}" class="list-group-item list-group-item-action">Upload Activity CSV</a>
            </div>
        </div>
    </div><!-- ./row -->
</div>
@endsection
