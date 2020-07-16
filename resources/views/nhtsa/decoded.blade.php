@extends('layouts.app')

@section('title', 'Decode Vehicle VIN Details using NHTSA')

@section('heads')
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h2>VIN Decode Details</h2>
        </div>
        <div class="col-6">
            <div class="text-right">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
    </div>

    @if ($message)
        <div class="small">{{ $message }}</div>
    @endif

    @if ($errorMessages)
        <ul class="list-group">
            @foreach ($errorMessages as $item)
                <li class="list-group-item py-1">{{ $item }}</li>
            @endforeach
        </ul>
    @endif
</div>
{{-- Vehicle Information --}}
<div class="container my-4">
    <div class="row font-weight-bold">
        <div class="col-2">Vehicle:</div>
        <div class="col-10">
            {{ $vehicle['Make'] }}
            {{ $vehicle['Model'] }}
            @if ($vehicle['Series'])
                {{ $vehicle['Series'] }}
            @endif
            @if ($vehicle['Series2'])
                {{ $vehicle['Series2'] }}
            @endif
            @if ($vehicle['Trim'])
                {{ $vehicle['Trim'] }}
            @endif
            @if ($vehicle['Trim2'])
                {{ $vehicle['Trim2'] }}
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">Body Type:</div>
        <div class="col-10">{{ $vehicle['NCSABodyType'] }}</div>
    </div>

    @if ($vehicle['BodyCabType'])
        <div class="row">
            <div class="col-2">Body Cab Type:</div>
            <div class="col-10">{{ $vehicle['BodyCabType'] }}</div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-2">Body Class:</div>
        <div class="col-10">{{ $vehicle['BodyClass'] }}</div>
    </div>
    
    <div class="row">
        <div class="col-2">Drive Type:</div>
        <div class="col-10">{{ $vehicle['DriveType'] }}</div>
    </div>
    
    <div class="row">
        <div class="col-2">Transmission:</div>
        <div class="col-10">
            @if ($vehicle['TransmissionSpeeds'])
                {{ $vehicle['TransmissionSpeeds'] }}-Speed
            @endif
            @if ($vehicle['TransmissionStyle'])
                {{ $vehicle['TransmissionStyle'] }}-Speed
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">Engine:</div>
        <div class="col-10">
            @if ($vehicle['DisplacementL']) {{ $vehicle['DisplacementL'] }}L @endif
            @if ($vehicle['EngineCylinders']) {{ $vehicle['EngineCylinders'] }}-Cyl @endif
            @if ($vehicle['EngineConfiguration']) {{ $vehicle['EngineConfiguration'] }} @endif
            @if ($vehicle['Turbo'] === 'Yes') Turbo @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">Fuel Type:</div>
        <div class="col-10">{{ $vehicle['FuelTypePrimary'] }}</div>
    </div>

    @if ($vehicle['FuelTypeSecondary'])
        <div class="row">
            <div class="col-2">Secondary Fuel Type:</div>
            <div class="col-10">{{ $vehicle['FuelTypeSecondary'] }}</div>
        </div>
    @endif
    
    <div class="row">
        <div class="col-2">Made At:</div>
        <div class="col-10">
            {{ $vehicle['PlantCity'] }},
            {{ $vehicle['PlantState'] }}
            {{ $vehicle['PlantCountry'] }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
