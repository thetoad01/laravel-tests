@extends('layouts.app')

@section('title', 'Oldest Vehicles Scraped from CDK Websites')

@section('heads')
@endsection

@section('content')
    <h1 class="text-center mt-3">Oldest Vehicles Scraped from CDK Websites</h1>

    {{-- @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif --}}

    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>Dealer</th>
                <th>VIN</th>
                <th>Vehicle</th>
                <th class="text-center">First Seen</th>
                <th class="text-center">Last Seen</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->dealer }}</td>
                    <td>{{ $vehicle->vin }}</td>
                    <td>
                        {{ $vehicle->year }}
                        {{ $vehicle->make }}
                        {{ $vehicle->model }}
                        {{ $vehicle->trim }}
                    </td>
                    <td class="text-center">{{ $vehicle->created_at }}</td>
                    <td class="text-center">{{ $vehicle->updated_at }}</td>
                    <td class="text-right">
                        <a href="{{ $vehicle->url }}" class="btn btn-sm btn-primary py-1 mr-2" target="_new">Visit</a>
                        <a href="{{ route('old-vehicles.show', $vehicle->id) }}" class="btn btn-sm btn-success py-1">Test</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div role="alert" aria-live="polite" aria-atomic="true" class="toast mt-3 mr-3" style="position: absolute; top: 0; right: 0;" data-autohide="false">
        <div class="toast-header default-color-dark text-white">
            <strong class="mr-auto">URL Test Result</strong>
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            @if (session('message'))
                {{ session('message') }}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
@if (Session::get('message'))
<script>
    $(function() {
        $('.toast').toast('show');

        $('.toast').click(function() {
            $('.toast').toast('dispose');
        });
    });
</script>
@endif
@endsection
