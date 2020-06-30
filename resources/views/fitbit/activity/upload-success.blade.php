@extends('layouts.app')

@section('title', 'Fitbit Activity Data')

@section('content')
<nav aria-label="breadcrumb" class="row navbar navbar-light stylish-color">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Fitbit</li>
        <li class="breadcrumb-item">
            <a href="{{ route('fitbit.activity.index') }}" class="text-white">Activity</a>
        </li>
        <li class="breadcrumb-item active">Upload Success</li>
    </ol>
</nav>

<div class="container my-4">


    <h1 class="mb-5 text-success">Fitbit Activity Data Uploaded Successfully!</h1>

    <div>The following data was added to the database:</div>
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th>Date</th>
                <th class="text-right">calories burned</th>
                <th class="text-right">steps</th>
                <th class="text-right">distance</th>
                <th class="text-right">floors</th>
                <th class="text-right">minutes sedentary</th>
                <th class="text-right">minutes lightly active</th>
                <th class="text-right">minutes fairly active</th>
                <th class="text-right">minutes very active</th>
                <th class="text-right">activity calories</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['date'] }}</td>
                    <td class="text-right">{{ $item['calories_burned'] }}</td>
                    <td class="text-right">{{ $item['steps'] }}</td>
                    <td class="text-right">{{ $item['distance'] }}</td>
                    <td class="text-right">{{ $item['floors'] }}</td>
                    <td class="text-right">{{ $item['minutes_sedentary'] }}</td>
                    <td class="text-right">{{ $item['minutes_lightly_active'] }}</td>
                    <td class="text-right">{{ $item['minutes_fairly_active'] }}</td>
                    <td class="text-right">{{ $item['minutes_very_active'] }}</td>
                    <td class="text-right">{{ $item['activity_calories'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ dd($data) }} --}}
</div>
@endsection
