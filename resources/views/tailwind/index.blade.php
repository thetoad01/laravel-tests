@extends('layouts.terminal')

@section('title', config('app.name', 'Terminal').' — tailwind_recreations')

@section('content')
<div class="container">
    <div class="row g-4">

        {{-- Header --}}
        <div class="col-12">
            <div class="mb-3">
                <div class="text-secondary small">directory</div>
                <h1 class="h4 mb-0">
                    <span class="text-success">$</span> ls -la /tailwind_recreations
                </h1>
                <div class="text-secondary small mt-1">
                    re-creations & tests. because reinventing UIs is how we cope.
                </div>
            </div>
            <hr class="border-secondary">
        </div>

        {{-- Tweet clone --}}
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tailwind.tweet') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">single_tweet_clone</div>
                    <div class="small text-secondary">
                        because building one tweet is easier than building a personality.<br>
                        feature set: like, reply, existential dread.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        {{-- Github clone --}}
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tailwind.github') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">github_clone</div>
                    <div class="small text-secondary">
                        the classic: clone GitHub to prove you can… clone GitHub.<br>
                        stars not included.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        {{-- Kanban --}}
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tailwind.kanban') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">kanban_board</div>
                    <div class="small text-secondary">
                        todo → doing → done → repeat forever.<br>
                        productivity cosplay, now in columns.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        <!-- Blog layout -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tailwind.blog') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">blog_layout</div>
                    <div class="small text-secondary">
                        every framework demo ends here eventually.<br>
                        “hello world” but with a hero section.
                    </div>
                    <div class="small mt-3 text-info">open →</div>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-4">
            <a href="{{ route('tailwind.dashboard') }}" class="text-decoration-none text-light">
                <div class="p-4 rounded bg-black terminal-border h-100 shadow-sm">
                    <div class="text-secondary small mb-1">module</div>
                    <div class="fw-semibold text-success mb-2">admin_dashboard</div>

                    <div class="small text-secondary">
                        charts, stats, and boxes with numbers.<br>
                        because every project eventually becomes a dashboard.
                    </div>

                    <div class="small mt-3 text-info">
                        open →
                    </div>
                </div>
            </a>
        </div>

        {{-- Optional extra card: index meta / disclaimer --}}
        <div class="col-md-6 col-lg-4">
            <div class="p-4 rounded bg-black terminal-border h-100">
                <div class="text-secondary small mb-1">notes</div>
                <div class="small text-secondary lh-sm">
                    these pages exist to test layout, spacing, and component discipline.<br>
                    yes, they&#039;re cliché. that&#039;s the point. known inputs make bugs easier to catch.
                    <div class="mt-2">
                        <span class="cursor">█</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4 small text-secondary d-flex flex-wrap justify-content-between gap-2">
        <div>theme: <span class="text-info">terminal</span></div>
        <div>originality: <span class="text-warning">deprecated</span> <span class="cursor">█</span></div>
    </div>
</div>
@endsection
