@extends('layouts.admin')

@section('title', 'Edit ' . $movie->title . ' | Cinema Admin')

@section('content')

<style>

    .current-poster {
        width: 100%;
        max-height: 220px;
        object-fit: cover;
        border-radius: var(--cinema-radius-sm);
        border: 1px solid var(--cinema-border);
    }

</style>


<div class="cine-container-narrow cinema-fade-in">

    {{-- Header --}}
    <div class="mb-3">

        <a
            href="{{ route('admin.movies.index') }}"
            class="back-link"
        >
            ← Back to Movies
        </a>

    </div>

    <div class="cine-header cine-header--compact">

        <div class="cine-header__body">

            <div>

                <span class="cine-kicker">
                    Cinema Management
                </span>

                <h1 class="cine-title fs-2">
                    Edit Movie
                </h1>

                <p class="cine-subtitle mb-0">
                    Update the information for "{{ $movie->title }}".
                </p>

            </div>

        </div>

    </div>


    {{-- Edit Card --}}
    <div class="cinema-card">

        <div class="cinema-card-body p-4">

            <form
                action="{{ route('admin.movies.update', $movie) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


                {{-- Current Poster --}}
                @if($movie->image)

                    <div class="mb-3">

                        <label class="cinema-form-label">
                            Current Poster
                        </label>

                        <img
                            src="{{ asset('storage/' . $movie->image) }}"
                            alt="{{ $movie->title }}"
                            class="current-poster"
                        >

                    </div>

                @endif


                {{-- Title --}}
                <div class="mb-3">

                    <label
                        for="title"
                        class="cinema-form-label"
                    >
                        Movie Title
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $movie->title) }}"
                        class="form-control-cinema @error('title') is-invalid-cinema @enderror"
                        placeholder="Enter movie title"
                    >

                    @error('title')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Description --}}
                <div class="mb-3">

                    <label
                        for="description"
                        class="cinema-form-label"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="form-control-cinema @error('description') is-invalid-cinema @enderror"
                        placeholder="Enter movie description"
                    >{{ old('description', $movie->description) }}</textarea>

                    @error('description')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Year & Rating --}}
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label
                            for="release_year"
                            class="cinema-form-label"
                        >
                            Release Year
                        </label>

                        <input
                            type="number"
                            id="release_year"
                            name="release_year"
                            value="{{ old('release_year', $movie->release_year) }}"
                            class="form-control-cinema @error('release_year') is-invalid-cinema @enderror"
                            placeholder="2026"
                        >

                        @error('release_year')

                            <div class="invalid-feedback-cinema">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="col-md-6 mb-3">

                        <label
                            for="rating"
                            class="cinema-form-label"
                        >
                            Rating
                        </label>

                        <input
                            type="number"
                            id="rating"
                            name="rating"
                            value="{{ old('rating', $movie->rating) }}"
                            step="0.1"
                            min="0"
                            max="10"
                            class="form-control-cinema @error('rating') is-invalid-cinema @enderror"
                            placeholder="8.5"
                        >

                        @error('rating')

                            <div class="invalid-feedback-cinema">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- New Poster --}}
                <div class="mb-3">

                    <label
                        for="image"
                        class="cinema-form-label"
                    >
                        Replace Poster
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control-cinema @error('image') is-invalid-cinema @enderror"
                        accept="image/*"
                    >

                    <small class="form-hint">
                        Leave empty to keep the current poster.
                    </small>

                    @error('image')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <hr class="form-divider">


                {{-- Actions --}}
                <div class="d-flex gap-2">

                    <button
                        type="submit"
                        class="btn btn-cinema-gold"
                    >
                        Save Changes
                    </button>


                    <a
                        href="{{ route('admin.movies.show', $movie) }}"
                        class="btn btn-cinema-outline"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection