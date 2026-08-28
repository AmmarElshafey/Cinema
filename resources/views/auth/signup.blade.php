@extends('layouts.app')

@section('title', 'Admin Sign Up | Cinema')

@section('content')

<div class="auth-shell cinema-fade-in">

    <div class="cinema-card auth-card">

        {{-- Header --}}
        <div class="auth-card__header">

            <div class="auth-icon">
                🎬
            </div>

            <span class="cine-kicker">
                Cinema Admin
            </span>

            <h1 class="cine-title">
                Create Admin Account
            </h1>

            <p class="cine-subtitle">
                Set up your account to manage the Cinema platform.
            </p>

        </div>


        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('admin.signup') }}"
        >

            @csrf


            {{-- Name + Email --}}
            <div class="row">

                <div class="col-md-6 mb-3">

                    <label
                        for="name"
                        class="cinema-form-label"
                    >
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control-cinema @error('name') is-invalid-cinema @enderror"
                        placeholder="Enter your name"
                        required
                    >

                    @error('name')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6 mb-3">

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
                    >

                    @error('email')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

            </div>


            {{-- Password + Confirm Password --}}
            <div class="row">

                <div class="col-md-6 mb-3">

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
                        placeholder="Create a password"
                        required
                    >

                    @error('password')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="col-md-6 mb-3">

                    <label
                        for="password_confirmation"
                        class="cinema-form-label"
                    >
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control-cinema"
                        placeholder="Confirm password"
                        required
                    >

                </div>

            </div>


            {{-- Submit --}}
            <button
                type="submit"
                class="btn btn-cinema w-100 mt-1"
            >
                Create Admin Account
            </button>

        </form>


        {{-- Login Link --}}
        <div class="auth-footer-link">

            Already have an account?

            <a href="{{ route('admin.login') }}">
                Login
            </a>

        </div>

    </div>


@endsection