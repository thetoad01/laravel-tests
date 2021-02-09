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

<section class="container mx-auto bg-white p-4">
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
        <div id="container" class="w-100" style="height:400px;"></div>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Price in USD'
            },
            yAxis: {
                title: {
                    text: 'Amount'
                }
            },
            xAxis: {
                categories: {!! $history->pluck('created_at') !!},
                // categories: [1,2,3,4,5,6,7,8],
                crosshair: true
            },
            series: [{
                name: 'Price',
                data: {{ $history->pluck('amount') }}
            }]
        });
    });
</script>
@endsection