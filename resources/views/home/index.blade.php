@extends('layouts.app')

@section('title', 'Movies | Cinema')

@section('content')

<div class="cinema-fade-in">

    {{-- Header --}}
    <div class="cine-header">

        <div class="cine-header__body">

            <div>

                <span class="cine-kicker">
                    Cinema Collection
                </span>

                <h1 class="cine-title">
                    Movies
                </h1>

                <p class="cine-subtitle">
                    Explore our movie collection.
                </p>

            </div>

        </div>

    </div>


    {{-- Movies Grid --}}
    @if($movies->isNotEmpty())

        <div class="row g-4">

            @foreach($movies as $movie)

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                    <div class="poster-card">


                        {{-- Poster --}}
                        <div class="poster-card__frame">

                            @if($movie->image)

                                <img
                                    src="{{ asset('storage/' . $movie->image) }}"
                                    alt="{{ $movie->title }}"
                                    class="poster-card__img"
                                >

                            @else

                                <div class="poster-card__no-image">
                                    No Image
                                </div>

                            @endif


                            <div class="poster-card__gradient"></div>


                            <span class="poster-card__rating">
                                ★ {{ $movie->rating }}
                            </span>


                            <span class="poster-card__year">
                                {{ $movie->release_year }}
                            </span>

                        </div>


                        {{-- Movie Information --}}
                        <div class="poster-card__body">

                            <h5 class="poster-card__title">
                                {{ $movie->title }}
                            </h5>


                            <p class="poster-card__desc">
                                {{ $movie->description }}
                            </p>


                            {{-- Public Action --}}
                            <div class="poster-card__actions">

                                <a
                                    href="{{ route('movies.show', $movie) }}"
                                    class="btn btn-cinema-outline btn-sm"
                                >
                                    View
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty State --}}
        <div class="cinema-card cinema-empty">

            <div class="cinema-empty-icon">
                🎬
            </div>

            <h3 class="mb-2">
                No Movies Yet
            </h3>

            <p class="mb-0">
                No movies are available yet.
            </p>

        </div>

    @endif

</div>

@endsection