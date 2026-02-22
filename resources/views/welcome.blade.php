@extends('layouts.terminal')

@section('title', config('app.name', 'Terminal').' — welcome')

@section('content')
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="mb-3">
                    <span class="badge text-bg-success me-2">LIVE</span>
                    <span class="badge text-bg-dark border border-secondary">build: v0.0.x</span>
                    <span class="badge text-bg-dark border border-secondary">mode: testing</span>
                </div>

                <h1 class="display-5 fw-bold lh-1">
                    <span class="text-success">[</span> new system online <span class="text-success">]</span>
                </h1>

                <p class="lead text-secondary mt-3 mb-4">
                    No marketing pages. No noise.<br class="d-none d-md-block">
                    tip: build less. think more. commit carefully.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="#preview" class="btn btn-outline-success">
                        view_preview
                    </a>
                    <a href="#notes" class="btn btn-outline-info">
                        read_notes
                    </a>
                    <a href="#oldstuff" class="btn btn-secondary text-black fw-bold">
                        old_stuff
                    </a>
                </div>

                <div class="row g-3 mt-4" id="notes">
                    <div class="col-md-4">
                        <div class="p-3 rounded bg-black terminal-border">
                            <div class="text-secondary small">module</div>
                            <div class="fw-semibold text-success">focus</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded bg-black terminal-border">
                            <div class="text-secondary small">module</div>
                            <div class="fw-semibold text-success">ops</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 rounded bg-black terminal-border">
                            <div class="text-secondary small">module</div>
                            <div class="fw-semibold text-success">vault</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Terminal window preview -->
            <div class="col-lg-5" id="preview">
                <div class="rounded bg-black terminal-border overflow-hidden shadow">
                    <x-terminal.window-header path="welcome" />

                    <div class="p-3">
                        <div class="text-secondary small mb-2">boot sequence</div>

                        <div class="mb-0 text-light small lh-sm font-monospace">
                            <div>
                                <span class="text-success">✓</span> loading modules...
                            </div>

                            <div>
                                <span class="text-success">✓</span> hardening surface...
                            </div>

                            <div>
                                <span class="text-success">✓</span> warming cache...
                            </div>

                            <div>
                                <span class="text-success">✓</span> opening channel:
                                <span class="text-info">early-access</span>
                            </div>

                            <div class="my-2 text-secondary">—</div>

                            <div>
                                type <span class="text-warning">request_access</span> to get an invite
                                <span class="cursor">█</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-3 small text-secondary">
                    tip: ship small. refactor later. deny everything.
                </div>
            </div>
        </div>
    </div>

    <section class="py-5" id="access">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="h4 fw-bold mb-2">
                        <span class="text-success">$</span> request_access
                    </h2>
                    <p class="text-secondary mb-0">
                        enter your email. we’ll notify you once. not twice. not weekly.
                    </p>
                </div>

                <div class="col-lg-6">
                    <form class="row g-2" action="{{ route('waitlist.store') }}" method="post">
                        @csrf
                        <div class="col-12 col-md">
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                            <input type="email" class="form-control bg-black text-light border-secondary" name="email" placeholder="you@domain.com" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-12 col-md-auto">
                            <button type="submit" class="btn btn-success text-black fw-bold w-100">
                                submit
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="form-text text-secondary">
                                no spam. no drip. one ping.
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="my-5 border-secondary">

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="p-4 rounded bg-black terminal-border h-100">
                        <div class="text-secondary small mb-1">signal</div>
                        <div class="fw-semibold">high</div>
                        <div class="text-secondary small mt-2">less UI. more intent.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded bg-black terminal-border h-100">
                        <div class="text-secondary small mb-1">latency</div>
                        <div class="fw-semibold">low</div>
                        <div class="text-secondary small mt-2">fast paths only.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 rounded bg-black terminal-border h-100">
                        <div class="text-secondary small mb-1">noise</div>
                        <div class="fw-semibold">none</div>
                        <div class="text-secondary small mt-2">no feeds. no fluff.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
