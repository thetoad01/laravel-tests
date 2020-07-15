@extends('layouts.app')

@section('title', 'Weather App Using Open Weather API | Laravel Tests')

@section('heads')
<style>
    body { background-color: #3e4551 !important; }
</style>
@endsection

@section('content')
<div class="unique-color row pb-4">
    <div class="container pt-4 px-sm-0">
        <h1 class="text-center text-white">Current Weather</h1>

        <div class="card">
            <div class="card-body">
                @if ($weather->count() < 2)
                    @include('weather.partials.no-weather')
                @else
                    @include('weather.partials.weather')
                @endif
            </div>
        </div>
    </div>
</div>
{{-- Forcast --}}
<div class="row py-4">
    <div class="container px-sm-0">
        <h2 class="text-center text-white">Forcast</h2>

        <div class="card">
            <div class="card-body">
                @if ($forcast->count() < 2)
                    @include('weather.partials.no-forcast')
                @else
                    @include('weather.partials.forcast')
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Enter zip code modal --}}
<div class="modal fade" id="zipcodeModal" tabindex="-1" role="dialog" aria-labelledby="zipcodeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zipcodeModalLabel">Enter Zip Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('weather.index') }}" method="GET">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="zip" id="zip" class="form-control" maxlength="5" placeholder="zipcode">
                    </div>
                    <div id="zipError"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" id="zipSubmit" class="btn btn-sm btn-success">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let button = document.getElementById('zipSubmit');
    let input = document.getElementById('zip');

    button.disabled = true
    input.onkeyup = updateValue;

    function updateValue(e) {
        let value = input.value;
        let len = input.value.length;
        
        if (isNaN(value) || len < 5) {
            button.disabled = true;
        } else {
            button.disabled = false;
        }
    }
</script>
@endsection
