@extends('layouts.terminal')

@section('title', config('app.name', 'Terminal').' — register')

@section('content')
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <div class="rounded bg-black terminal-border overflow-hidden shadow">
                    <x-terminal.window-header path="register" />

                    <div class="text-light small lh-sm font-monospace py-4 px-3">
                        <div class="mb-2">
                            <span class="text-warning">!</span> registration endpoint reachable
                        </div>

                        <div>
                            account creation: intentionally disabled.
                        </div>

                        <div>
                            deployment scope: personal sandbox.
                        </div>

                        <div>
                            expected users: 1
                        </div>

                        <div class="mt-3 text-secondary">
                            this is not a product. it is a lab.
                        </div>

                        <div class="mt-3">
                            <span class="cursor">█</span>
                        </div>

                    </div>

                </div>

                <div class="mt-3 small text-secondary d-flex flex-wrap justify-content-between gap-2">
                    <div>mode: <span class="text-warning">sandbox</span></div>
                    <div>users: <span class="text-danger">restricted</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
