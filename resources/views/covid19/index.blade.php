@extends('layouts.tailwind')

@section('title', 'Covid19 Data United States')

@section('heads')
@endsection

@section('content')
<div class="min-h-screen bg-gray-800 py-8">
    <div class="container mx-auto bg-gray-100 p-8">
        <h1 class="my-6 text-center text-4xl font-bolder">{{ $population['country_name'] }} Covid 19 Data</h1>

        {{-- Charts --}}
        <div id="container" class="w-100" style="height:400px;"></div>

        {{-- Population --}}
        <div class="flex mt-4 space-x-6 text-xl">
            <span>{{ $population['country_name'] }} Population:</span>
            <span>
                {{ number_format($population['population'], 0) }}
            </span>
        </div>

        {{-- Covid19 Data --}}
        <table class="min-w-full table-auto my-4 text-sm">
            <thead>
                <tr class="bg-gray-800">
                    <th class="text-gray-300 text-left px-4">Day</th>
                    <th class="text-gray-300 text-center px-4">Total Confirmed</th>
                    <th class="text-gray-300 text-center px-4">New Confirmed</th>
                    <th class="text-gray-300 text-center px-4">Confirmed % of Pop</th>
                    <th class="text-gray-300 text-center px-4">Total Deaths</th>
                    <th class="text-gray-300 text-center px-4">New Deaths</th>
                    <th class="text-gray-300 text-center px-4">Deaths % of Pop</th>
                    <th class="text-gray-300 text-center px-4">Deaths % of Confirmed</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                    {{-- {{ dd($item) }} --}}
                    <tr class="hover:bg-gray-200">
                        <td class="px-4">{{ \Carbon\Carbon::parse($item['date'])->format('D, F d, Y') }}</td>
                        <td class="px-4 text-center">{{ number_format($item['confirmed'], 0) }}</td>
                        <td class="px-4 text-center">{{ number_format($item['newConfirmed'], 0) }}</td>
                        <td class="px-4 text-center">{{ number_format($item['avgConfirmedPerPop'], 4) }}%</td>
                        <td class="px-4 text-center">{{ number_format($item['deaths'], 0) }}</td>
                        <td class="px-4 text-center">{{ number_format($item['newDeaths'], 0) }}</td>
                        <td class="px-4 text-center">{{ number_format($item['avgDeathsPerPop'], 4) }}%</td>
                        <td class="px-4 text-center">{{ number_format($item['avgDeathsPerConfirmed'], 4) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 text-sm">
            Data source: COVID-19 Data Repository by the Center for Systems Science and Engineering (CSSE) at Johns Hopkins University
        </div>
        <div class="mb-4 text-xs">
            <a href="{{ route('covid19.create') }}" class="text-gray-500 hover:underline">Update Data</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'New Confirmed Cases Per Day (last 30 days)'
            },
            yAxis: {
                title: {
                    text: 'Amount'
                }
            },
            xAxis: {
                categories: {{ $data->pluck('dateString') }}.reverse(),
                crosshair: true
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            series: [{
                name: 'Cases',
                data: {{ collect($data)->pluck('newConfirmed') }}.reverse()
            }]
        });
    });
</script>
@endsection