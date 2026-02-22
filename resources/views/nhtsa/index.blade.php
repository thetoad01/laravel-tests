@extends('layouts.terminal')

@section('title', 'decode_vin — NHTSA')

@section('head')
    <meta name="description" content="Decode a VIN number free. Get information about US vehicle using the VIN and year." />
    <x-social-media-meta-tags
        title="Decode Vehicle VIN"
        description="Decode a VIN number free. Get information about US vehicle using the VIN and year."
        image="https://live.staticflickr.com/184/480340903_439374488f_z.jpg"
        card="summary"
    />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Terminal Window -->
            <div class="rounded bg-black terminal-border overflow-hidden shadow">
                <x-terminal.window-header path="nhtsa-decode" />

                <div class="p-4">

                    <!-- Header -->
                    <div class="mb-3">
                        <div class="text-secondary small">command</div>
                        <h1 class="h4 mb-0">
                            <span class="text-success">$</span> decode_vin
                        </h1>
                        <div class="text-secondary small mt-1">
                            translates 17 mysterious characters into vehicle facts.
                        </div>
                    </div>

                    <hr class="border-secondary my-4">

                    <!-- Info -->
                    <div class="small text-secondary mb-4">
                        data source: NHTSA open data api.<br>
                        free to use. government powered. surprisingly reliable.<br>
                        <a href="https://vpic.nhtsa.dot.gov/api/home/index/faq"
                           target="_blank"
                           rel="noopener"
                           class="link-info text-decoration-none">
                            read_the_faq →
                        </a>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('nhtsa.store') }}" method="POST" class="vstack gap-3">
                        @csrf

                        <!-- VIN -->
                        <div>
                            <label for="vin" class="form-label text-secondary small mb-1">
                                input_vin (17 characters required)
                            </label>

                            <input type="text"
                                   name="vin"
                                   id="vin"
                                   value="{{ old('vin') }}"
                                   class="form-control bg-black text-light border-secondary @error('vin') is-invalid @enderror"
                                   placeholder="1HGCM82633A004352"
                                   maxlength="17">

                            <div class="form-text text-secondary">
                                pre-1981 vins exist. this tool pretends they don't.
                            </div>

                            @error('vin')
                                <div class="invalid-feedback d-block">
                                    <span class="text-warning">!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="year" class="form-label text-secondary small mb-1">
                                vehicle_year (optional)
                            </label>

                            <input type="number"
                                   name="year"
                                   id="year"
                                   value="{{ old('year') }}"
                                   class="form-control bg-black text-light border-secondary @error('year') is-invalid @enderror"
                                   placeholder="auto-detect from vin">

                            @error('year')
                                <div class="invalid-feedback d-block">
                                    <span class="text-warning">!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 align-items-center pt-2">
                            <button type="submit" class="btn btn-success text-black fw-bold">
                                execute
                            </button>

                            <a href="{{ url()->current() }}" class="btn btn-outline-secondary">
                                reset
                            </a>

                            <span class="ms-auto text-secondary small">
                                api_call: pending<span class="cursor">█</span>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Recents -->
            @if ($recents && count($recents))
                <div class="mt-4">
                    <div class="text-secondary small mb-2">recent_activity</div>

                    <div class="rounded bg-black terminal-border overflow-hidden">
                        <div class="px-3 py-2 border-bottom border-secondary small text-secondary">
                            last_decodes (because you will forget what you just did)
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-dark mb-0 align-middle">
                                <thead class="text-secondary">
                                    <tr>
                                        <th class="text-secondary">vin</th>
                                        <th class="text-secondary">year</th>
                                        <th class="text-secondary">make</th>
                                        <th class="text-secondary">model</th>
                                        <th class="text-secondary">series</th>
                                        <th class="text-secondary">trim</th>
                                        <th class="text-secondary text-end">action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($recents as $recent)
                                        <tr>
                                            <td class="font-monospace">{{ $recent->VIN }}</td>
                                            <td>{{ $recent->ModelYear }}</td>
                                            <td>{{ $recent->Make }}</td>
                                            <td>{{ $recent->Model }}</td>
                                            <td>{{ $recent->Series }}</td>
                                            <td>{{ $recent->Trim }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('nhtsa.show', $recent->VIN) }}"
                                                class="btn btn-outline-info btn-sm">
                                                    re_run
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-2 small text-secondary">
                        note: clicking <span class="text-info">re_run</span> just replays the decode. no magic. no upgrades.
                    </div>
                </div>
            @endif

            <!-- Status row -->
            <div class="mt-4 small text-secondary d-flex flex-wrap justify-content-between gap-2">
                <div>source: <span class="text-info">NHTSA</span></div>
                <div>mode: <span class="text-warning">decode_only</span></div>
            </div>

        </div>
    </div>
</div>
@endsection
