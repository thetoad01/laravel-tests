@extends('layouts.terminal')

@php
    $data = session('success_data');
    $msg  = session('success_message');
@endphp

@section('title', config('app.name', 'Terminal').' — success')

@section('content')
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <div class="rounded bg-black terminal-border overflow-hidden shadow">
                    <x-terminal.window-header path="success" />

                    <div class="p-4">
                        <div class="d-flex align-items-start justify-content-between flex-wrap gap-3">
                            <div>
                                <div class="text-secondary small mb-1">result</div>
                                <h1 class="h4 mb-0">
                                    <span class="text-success">✓</span> submission accepted
                                </h1>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ url('/') }}" class="btn btn-outline-info btn-sm">return_home</a>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">go_back</a>
                            </div>
                        </div>

                        <hr class="my-4 border-secondary">

                        @if($data && is_array($data))
                            <div class="text-secondary small mb-2">stdout</div>

                            <div class="mb-0 text-light small lh-sm">
                                <div class="mb-2">
                                    <span class="text-success">✓</span>
                                    {{ $data['title'] ?? 'Success.' }}
                                </div>

                                @if(!empty($data['lines']) && is_array($data['lines']))
                                    @foreach($data['lines'] as $line)
                                        <div class="ps-4">{{ $line }}</div>
                                    @endforeach
                                @endif

                                @if(!empty($data['footer']))
                                    <div class="mt-3 text-secondary">
                                        {{ $data['footer'] }}
                                    </div>
                                @endif

                                <div><span class="cursor">█</span></div>
                            </div>
                        @elseif($msg)
                            <div class="text-secondary small mb-2">stdout</div>
                            <pre class="mb-0 text-light small">{!! nl2br(e($msg)) !!}<span class="cursor">█</span></pre>
                        @else
                        <div class="alert alert-warning border-secondary bg-dark mb-0">
                            <span class="text-warning">!</span> output stream empty.
                            <div class="text-secondary small mt-1">
                                nothing to display. either the signal was lost or this is a test transmission.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-3 small text-secondary d-flex flex-wrap justify-content-between gap-2">
                    <div>status: <span class="text-success">200 OK</span></div>
                    <div>session: <span class="text-success">flashed</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
