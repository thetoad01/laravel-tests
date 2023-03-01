@extends('layouts.tailwind')

@section('title', 'Bitcoin Prices')

@section('heads')
@endsection

@section('content')
<header class="container mx-auto pt-4 pb-2">
    <div class="flex items-center justify-between">
        <a class="text-left pl-4 hover:text-blue-700" href="/" title="home">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
        </a>
        <h1 class="text-2xl text-center">Bitcoin Price Chart</h1>
        <div class="text-right px-4"></div>
    </div>
</header>

<section class="container mx-auto bg-white p-4 mb-6">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <h2 class="text-center">
                <div class="text-xl font-bold">
                    @isset($current_price['amount'])
                        ${{ number_format($current_price['amount'], 2) ?? 0 }}
                    @endisset
                </div>
                <div class="text-sm text-gray-600">Current Spot Price</div>
            </h2>
        </div>
        <div>
            <h2 class="text-center">
                <div class="text-xl font-bold">
                    @isset($current_price['amount'])
                        ${{ number_format($twentyfour_average, 2) }}
                    @endisset
                </div>
                <div class="text-sm text-gray-600">24 Hour Avarage</div>
            </h2>
        </div>
        <div>
            <h2 class="text-center">
                <div class="text-xl font-bold @if($twentyfour_diff < 0) text-red-600 @else text-green-600 @endif">
                    @isset($current_price['amount'])
                        {{ number_format($twentyfour_hour_change, 2) }}%
                    @endisset
                </div>
                <div class="text-sm text-gray-600">Current vs 24 hour avg</div>
            </h2>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4 mt-4">
        <div>
            <h2 class="text-center">
                <div class="text-xl font-bold">
                    @isset($current_price['amount'])
                        ${{ number_format($twentyfour_high, 2) }}
                    @endisset
                </div>
                <div class="text-sm text-gray-600">24 Hour High</div>
            </h2>
        </div>
        <div>
            <h2 class="text-center">
                <div class="text-xl font-bold">
                    @isset($current_price['amount'])
                        ${{ number_format($twentyfour_low, 2) }}
                    @endisset
                </div>
                <div class="text-sm text-gray-600">24 Hour Low</div>
            </h2>
        </div>
        <div>
            <h2 class="text-center">
                <div class="text-xl font-bold @if($twentyfour_diff < 0) text-red-600 @else text-green-600 @endif">
                    @isset($current_price['amount'])
                        ${{ number_format($twentyfour_diff, 2) }}
                    @endisset
                </div>
                <div class="text-sm text-gray-600">Current vs 24 hour avg +/-</div>
            </h2>
        </div>
    </div>

    <div class="p-4">
        {{-- Chart --}}
        <div id="chart" class="w-100" style="height:400px;"></div>
    </div>

    <div class="mt-6 p-4">
        <table class="table-auto w-full border">
            <thead class="border-t border-b bg-blue-200">
                <th class="text-left px-4">Symbol</th>
                <th class="text-left px-4">Price</th>
                <th class="text-right px-4">Date/Time</th>
            </thead>
            <tbody>
                @foreach ($history as $item)
                    <tr class="hover:bg-gray-200">
                        <td class="text-left px-4">{{ $item->coin }}</td>
                        <td class="text-left px-4">${{ number_format($item->amount, 2) }}</td>
                        <td class="text-right px-4">{{ Carbon\Carbon::parse($item->created_at)->setTimezone('America/Detroit')->toDayDateTimeString() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-sm p-4 text-gray-600">
        Date/time is set to EST.  Prices are in USD and taken from the Coinbase spot price updated hourly.
    </div>
</section>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data-2012-2022.min.js"></script>
<script>
    const average = {{ $twentyfour_average }};

    Highcharts.setOptions({
        lang: {thousandsSep: ','},
        time: { timezone: 'America/Detroit' }
    });

    const chart = Highcharts.chart('chart', {
        chart: { type: 'spline' },
        title: { text: 'Price in USD' },
        yAxis: {
            title: {
                text: 'Amount'
            }
        },
        xAxis: {
            categories: {!! $history->pluck('timestamp') !!}.reverse(),
            crosshair: true,
            type: 'datetime',
            labels: {
                formatter: function() { return Highcharts.dateFormat('%b %e, %Y %H:%M', this.value) }
            }
        },
        series: [{
            name: 'Price',
            data: {{ $history->pluck('amount') }}.reverse()
        }],
        tooltip: {
            shared: true,
            useHTML: true,
            padding: 0,
            outside: false,
            pointFormatter: function() {
                return '<tr>' +
                        '<td class="text-start px-2 py-1">' + this.series.name + ':</td>' + 
                        '<td class="text-end">$ ' + this.y.toLocaleString() + ' </td>' + 
                        '<td class="px-4">' + (this.y - average).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + '</td>' +
                        '</tr>'
            },
            headerFormat: '<table class="table-auto"><thead class="bg-blue-600 text-white"><tr>' +
                '<th class="px-2" colspan="2">{point.key:%b %e, %Y %H:%M} EST</th>' + 
                '<th class="px-4">+/- 24 hr avg</th>' +
                '</tr></thead><tbody>',
            footerFormat: '</tbody></table>'
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        chart.yAxis[0].addPlotLine({
            value: average,
            color: '#e9967a',
            width: 2,
            dashStyle: 'dash',
            id: 'avg',
            label: {
                text: '24 Hr Avg: ' + average.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})
            }
        });
    });
</script>
@endsection