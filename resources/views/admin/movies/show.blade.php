@extends('layouts.admin')

@section('title', $movie->title . ' | Cinema Admin')

@section('content')

<style>

    .movie-details-poster {
        width: 100%;
        max-height: 460px;
        object-fit: cover;
        border-radius: var(--cinema-radius);
        border: 1px solid var(--cinema-border);
        box-shadow: var(--cinema-shadow);
    }

    .movie-no-image {
        height: 380px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--cinema-surface);
        color: var(--cinema-muted-soft);
        border-radius: var(--cinema-radius);
        border: 1px solid var(--cinema-border);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }

    .movie-details-title {
        font-family: var(--font-display);
        color: #fff;
        font-size: 2.3rem;
        font-weight: 700;
        line-height: 1.15;
    }

    .movie-details-meta {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 1.1rem;
        color: var(--cinema-muted);
        font-size: 0.95rem;
    }

    .movie-details-rating {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        color: var(--cinema-gold);
        font-weight: 700;
    }

    .movie-details-desc {
        color: var(--cinema-muted);
        line-height: 1.8;
        max-width: 640px;
    }

    @media (max-width: 767.98px) {

        .movie-details-title {
            font-size: 1.85rem;
        }

    }

</style>


<div class="cinema-fade-in">

    {{-- Back --}}
    <div class="mb-3">

        <a
            href="{{ route('admin.movies.index') }}"
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


                    {{-- Actions --}}
                    <div class="d-flex flex-wrap gap-2">

                        <a
                            href="{{ route('admin.movies.edit', $movie) }}"
                            class="btn btn-cinema-gold"
                        >
                            Edit Movie
                        </a>


                        <a
                            href="{{ route('admin.movies.index') }}"
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