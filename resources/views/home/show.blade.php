@extends('layouts.app')

@section('title', $movie->title . ' | Cinema')

@section('content')

<div class="cinema-fade-in">

    {{-- Back --}}
    <div class="mb-3">

        <a
            href="{{ route('home') }}"
            class="back-link"
        >
            ← Back to Movies
        </a>

    </div>


    {{-- Movie Details --}}
    <div class="cinema-card">

        <div class="cinema-card-body p-4">

            <div class="row g-4 align-items-center">


                {{-- Poster --}}
                <div class="col-md-4">

                    @if($movie->image)

                        <img
                            src="{{ asset('storage/' . $movie->image) }}"
                            alt="{{ $movie->title }}"
                            class="movie-details-poster"
                        >

                    @else

                        <div class="movie-no-image">
                            No Image
                        </div>

                    @endif

                </div>


                {{-- Information --}}
                <div class="col-md-8">

                    <span class="cine-kicker">
                        Movie Details
                    </span>


                    <h1 class="movie-details-title mt-2 mb-3">
                        {{ $movie->title }}
                    </h1>


                    <div class="movie-details-meta mb-3">

                        <span>
                            {{ $movie->release_year }}
                        </span>


                        <span class="movie-details-rating">
                            ★ {{ $movie->rating }}
                        </span>

                    </div>


                    <p class="movie-details-desc mb-4">
                        {{ $movie->description }}
                    </p>


                    {{-- Public Action --}}
                    <div class="d-flex flex-wrap gap-2">

                        <a
                            href="{{ route('home') }}"
                            class="btn btn-cinema-outline"
                        >
                            Back to Movies
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection