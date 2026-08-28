@extends('layouts.admin')

@section('title', 'Add Movie | Cinema Admin')

@section('content')

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
                    Add Movie
                </h1>

                <p class="cine-subtitle mb-0">
                    Add a new movie to your cinema collection.
                </p>

            </div>

        </div>

    </div>


    {{-- Form Card --}}
    <div class="cinema-card">

        <div class="cinema-card-body p-4">

            <form
                action="{{ route('admin.movies.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


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
                        value="{{ old('title') }}"
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
                    >{{ old('description') }}</textarea>

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
                            value="{{ old('release_year') }}"
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
                            value="{{ old('rating') }}"
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


                {{-- Poster --}}
                <div class="mb-3">

                    <label
                        for="image"
                        class="cinema-form-label"
                    >
                        Movie Poster
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control-cinema @error('image') is-invalid-cinema @enderror"
                        accept="image/*"
                    >

                    <small class="form-hint">
                        Upload a JPG, JPEG, PNG, or WebP movie poster.
                    </small>

                    @error('image')

                        <div class="invalid-feedback-cinema">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <hr class="form-divider">


                {{-- Actions --}}
                <div class="d-flex justify-content-end gap-2">

                    <a
                        href="{{ route('admin.movies.index') }}"
                        class="btn btn-cinema-outline"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="btn btn-cinema"
                    >
                        Add Movie
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection