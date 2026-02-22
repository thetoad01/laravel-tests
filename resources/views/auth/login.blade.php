{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.terminal')

@section('title', config('app.name', 'Terminal').' — login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="rounded bg-black terminal-border overflow-hidden shadow">
                <x-terminal.window-header path="login" />

                <div class="p-4">
                    <div class="mb-3">
                        <div class="text-secondary small">command</div>
                        <h1 class="h4 mb-0">
                            <span class="text-success">$</span> authenticate
                        </h1>
                        <div class="text-secondary small mt-1">
                            prove you&#039;re you. or at least someone with a password.
                        </div>
                    </div>

                    <hr class="my-4 border-secondary">

                    <form method="POST" action="{{ route('login') }}" class="vstack gap-3">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="form-label text-secondary small mb-1">
                                identity (email)
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="you@domain.com"
                                class="form-control bg-black text-light border-secondary @error('email') is-invalid @enderror"
                            >
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <span class="text-warning">!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="form-label text-secondary small mb-1">
                                secret (password)
                            </label>
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="••••••••"
                                class="form-control bg-black text-light border-secondary @error('password') is-invalid @enderror"
                            >
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <span class="text-warning">!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Remember --}}
                        <div class="form-check">
                            <input
                                class="form-check-input border-secondary"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <label class="form-check-label text-secondary small" for="remember">
                                persist_session (remember me)
                            </label>
                        </div>

                        <div class="d-flex flex-wrap gap-2 align-items-center pt-2">
                            <button type="submit" class="btn btn-success text-black fw-bold">
                                login
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-outline-secondary" href="{{ route('password.request') }}">
                                    forgot_password
                                </a>
                            @endif

                            <a class="btn btn-outline-info ms-auto" href="{{ url('/') }}">
                                return_home
                            </a>
                        </div>

                        <div class="text-secondary small pt-2">
                            note: repeated failures will be judged silently.
                            <span class="cursor">█</span>
                        </div>
                    </form>
                </div>
            </div>

            <x-terminal.module-status module="auth" status="restricted" module-class="text-info" status-class="text-warning" />
        </div>
    </div>
</div>
@endsection
