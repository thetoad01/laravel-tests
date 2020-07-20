@extends('layouts.app')

@section('title', 'Stats About Vehicles Scraped from CDK Websites')

@section('heads')
@endsection

@section('content')
    <h1 class="text-center mt-3">Stats for Scraped Vehicles from CDK Websites</h1>

    <div class="my-4">
        <div class="h1">Total Vehicles {{ $total ?? 'N/A' }}</div>

        <div id="chart1"></div>
    </div><!-- ./container -->
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
// Create the chart
Highcharts.chart('chart1', {
    chart: {
        type: 'bar',
        height: 800,
        // spacing:[5,5,0,0],
    },
    title: {
        text: 'Vehicle Makes'
    },
    subtitle: {
        text: 'Scraped vehicles currently listed as being live.'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Qty of Makes'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.percentage:.2f}%</b> of total<br/>'
    },
    series: [
        {
            name: "Makes",
            colorByPoint: true,
            data: {!! $data !!}
        }
    ]
});
</script>
@endsection