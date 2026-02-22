@extends('layouts.terminal')

@section('title', config('app.name', 'Terminal').' — coinbase_price')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="rounded bg-black terminal-border overflow-hidden shadow">
                <x-terminal.window-header path="coinbase-price" />

                <div class="p-4">
                    <div class="mb-3">
                        <div class="text-secondary small">project</div>
                        <h1 class="h4 mb-0">
                            <span class="text-success">$</span> coinbase_price_history
                        </h1>
                        <div class="text-secondary small mt-1">
                            legacy module. still functional. still judging you.
                        </div>
                    </div>

                    <hr class="my-4 border-secondary">

                    <div class="small lh-sm font-monospace">
                        <div class="mb-2">
                            <span class="text-success">✓</span> includes an API request layer with basic error handling
                        </div>
                        <div class="mb-2">
                            <span class="text-success">✓</span> renders price history charts using <span class="text-info">Highcharts</span>
                        </div>
                        <div class="mb-2">
                            <span class="text-success">✓</span> presents tabular history using <span class="text-info">DataTables</span>
                        </div>
                        <div class="text-secondary mt-3">
                            notes: this was built as a practical demo—fetch, validate, fail gracefully, render clean.
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 align-items-center mt-4">
                        <a
                            href="https://bitcoinmi.net/coinbase-price"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn btn-success text-black fw-bold"
                        >
                            open_live_page
                        </a>

                        <a href="{{ url('/') }}" class="btn btn-outline-info">
                            return_home
                        </a>

                        <div class="ms-auto small text-secondary">
                            external_link: enabled <span class="cursor">█</span>
                        </div>
                    </div>
                </div>
            </div>

            <x-terminal.module-status module="charts+tables" status="legacy" />

        </div>
    </div>
</div>
@endsection
