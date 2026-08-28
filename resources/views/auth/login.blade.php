@extends('layouts.app')

@section('title', 'Admin Sign In | Cinema')

@section('content')

<div class="auth-shell cinema-fade-in">

    <div class="cinema-card auth-card auth-card--narrow">

        {{-- Header --}}
        <div class="auth-card__header">

            <div class="auth-icon">
                🎬
            </div>

            <span class="cine-kicker">
                Cinema Admin
            </span>

            <h1 class="cine-title">
                Welcome Back
            </h1>

            <p class="cine-subtitle">
                Sign in to manage the Cinema platform.
            </p>

        </div>


        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('admin.login') }}"
        >

            @csrf


            {{-- Email --}}
            <div class="mb-3">

                <label
                    for="email"
                    class="cinema-form-label"
                >
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control-cinema @error('email') is-invalid-cinema @enderror"
                    placeholder="admin@example.com"
                    required
                    autofocus
                >

                @error('email')

                    <div class="invalid-feedback-cinema">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- Password --}}
            <div class="mb-3">

                <label
                    for="password"
                    class="cinema-form-label"
                >
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control-cinema @error('password') is-invalid-cinema @enderror"
                    placeholder="Enter your password"
                    required
                >

                @error('password')

                    <div class="invalid-feedback-cinema">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            {{-- Remember Me --}}
            <div class="auth-check mb-4">

                <input
                    type="checkbox"
                    id="remember"
                    name="remember"
                >

                <label for="remember" class="m-0">
                    Remember me
                </label>

            </div>


            {{-- Submit --}}
            <button
                type="submit"
                class="btn btn-cinema w-100"
            >
                Sign In
            </button>

        </form>


        {{-- Signup Link --}}
        <div class="auth-footer-link">

            Don't have an account?

            <a href="{{ route('admin.signup') }}">
                Create one
            </a>

        </div>

    </div>


</div>

@endsection