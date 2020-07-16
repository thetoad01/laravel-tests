@extends('layouts.app')

@section('title', 'Decode Vehicle VIN using NHTSA')

@section('heads')
@endsection

@section('content')
<div class="container mt-4">
    <h1>Decode VIN using NHTSA</h1>

    <div class="small">
        NHTSA is a government agency and the services provided on the API are free for use by the public as an offering as a part of the Open Data initiatives.
        Want more information?
        <a href="https://vpic.nhtsa.dot.gov/api/home/index/faq" target="_new">click here</a>
    </div>
</div><!-- ./container -->

<div class="container mt-5">
    <form action="{{ route('nhtsa.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="vin">
                Enter VIN
                <span class="ml-3 small">Note:  The NTSHA will decode pre-1981 VINs but this site is restricted to 17 character VINs only.</span>
            </label>
            <input type="text" name="vin" id="vin" class="form-control" value="{{ old('vin') }}">

            @error('vin')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="year">Vehicle Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}">

            @error('year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-sm btn-success">Decode VIN</button>
    </form>
</div><!-- ./container -->
@endsection

@section('scripts')
@endsection
