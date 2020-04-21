@extends('layouts.app')

@section('title', 'Vehicles Scraped from CDK Websites')

@section('heads')
@endsection

@section('content')

    <h1 class="text-center mt-3">Vehicles Scraped from CDK Websites</h1>

    <div class="row px-4 white">
        <div class="col-sm-2">
            <select id="selectYear" class="mdb-select md-form m-0">
                <option value="" disabled selected>Filter by Year</option>
                <option value="">All</option>
                @foreach ($years as $year)
                    <option value="{{ $year->year }}"{{ app('request')->input('year') == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-2">
            <select id="selectMake" class="mdb-select md-form m-0">
                <option value="" disabled selected>Filter by Make</option>
                <option value="">All</option>
                @foreach ($makes as $make)
                    <option value="{{ $make->make }}"{{ app('request')->input('make') == $make->make ? 'selected' : '' }}>{{ $make->make }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-2">
            <select id="selectModel" class="mdb-select md-form m-0">
                <option value="" disabled selected>Filter by Model</option>
                <option value="">All</option>
                @foreach ($models as $model)
                    <option value="{{ $model->model }}"{{ app('request')->input('model') == $model->model ? 'selected' : '' }}>{{ $model->model }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-2">
            <a href="/vehicles" class="btn btn-sm btn-info">Reset</a>
        </div>
    </div>

    {{-- Pagination links --}}
    <div class="container-fluid mt-3">
        {{ $vehicles->appends(Request::all())->links() }}
    </div>

    <div class="container-fluid">
        <ul class="list-group">
            @foreach ($vehicles as $vehicle)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col">
                            <span class="h5">{{ $vehicle->dealer }}</span>
                            <span class="pl-4">Stock #: {{ $vehicle->stock_number }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ $vehicle->vin }}
                        </div>
                        <div class="col">
                            {{ $vehicle->year }}
                            {{ $vehicle->make }}
                            {{ $vehicle->model }}
                            {{ $vehicle->trim }}
                        </div>
                        <div class="col">
                            {{ $vehicle->exterior_color }}
                        </div>
                        <div class="col">
                            <a href="/vehicles/{{ $vehicle->id }}" class="btn btn-sm btn-primary float-right">View</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Pagination links --}}
    <div class="container-fluid mt-3">
        {{ $vehicles->appends(Request::all())->links() }}
    </div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.mdb-select').materialSelect();

    $('#selectYear').on('change', function(event) {
        event.preventDefault();
        let make = $('#selectMake').val();
        let model = $('#selectModel').val();

        window.location.href = '/vehicles?filter' + '&year=' + this.value + (make ? '&make=' + make : '') + (model ? '&model=' + model : '');
    });

    $('#selectMake').on('change', function(event) {
        event.preventDefault();
        let year = $('#selectYear').val();
        let model = $('#selectModel').val();

        window.location.href = '/vehicles?' + (year ? 'year=' + year + '&' : '') + 'make=' + this.value + (model ? '&model=' + model : '');
    });

    $('#selectModel').on('change', function(event) {
        event.preventDefault();
        let year = $('#selectYear').val();
        let make = $('#selectMake').val();

        window.location.href = '/vehicles?' + (year ? 'year=' + year + '&' : '') + (make ? '&make=' + make + '&' : '') + 'model=' + this.value;
    });
});
</script>
@endsection
