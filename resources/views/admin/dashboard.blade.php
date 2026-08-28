@extends('layouts.admin')

@section('title', 'Dashboard | Cinema')

@section('content')

<div class="cinema-fade-in">

    {{-- Header --}}
    <div class="cine-header">

        <div class="cine-header__body">

            <div>

                <span class="cine-kicker">
                    Admin Panel
                </span>

                <h1 class="cine-title">
                    Welcome, {{ $user->name }}
                </h1>

                <p class="cine-subtitle">
                    Manage your cinema and movie collection.
                </p>

            </div>

        </div>

    </div>


    {{-- Statistics --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">

            <div class="stat-tile">

                <div class="stat-tile__icon">
                    🎬
                </div>

                <div class="stat-tile__label">
                    Total Movies
                </div>

                <p class="stat-tile__value">
                    {{ $movieCount }}
                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="stat-tile">

                <div class="stat-tile__icon">
                    ⭐
                </div>

                <div class="stat-tile__label">
                    Average Rating
                </div>

                <p class="stat-tile__value">

                    {{ $averageRating !== null
                        ? number_format($averageRating, 1)
                        : '—'
                    }}

                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="stat-tile">

                <div class="stat-tile__icon">
                    📅
                </div>

                <div class="stat-tile__label">
                    Latest Release
                </div>

                <p class="stat-tile__value">
                    {{ $latestRelease ?? '—' }}
                </p>

            </div>

        </div>

    </div>


    {{-- Quick Actions --}}
    <div class="mb-4">

        <h2 class="cine-title fs-4 mb-2">
            Quick Actions
        </h2>

        <div class="cinema-card cinema-card-body">

            <div class="d-flex flex-wrap gap-2">

                <a
                    href="{{ route('admin.movies.create') }}"
                    class="btn btn-cinema-gold"
                >
                    + Add Movie
                </a>


                <a
                    href="{{ route('admin.movies.index') }}"
                    class="btn btn-cinema-outline"
                >
                    Manage Movies
                </a>

            </div>

        </div>

    </div>


    {{-- Recent Movies --}}
    <div>

        <div class="d-flex justify-content-between align-items-center mb-2">

            <h2 class="cine-title fs-4 mb-0">
                Recent Movies
            </h2>


            <a
                href="{{ route('admin.movies.index') }}"
                class="text-cinema-muted small"
            >
                View All →
            </a>

        </div>


        <div class="cinema-card" style="overflow: hidden;">

            @if($recentMovies->isNotEmpty())

                @foreach($recentMovies as $movie)

                    <div class="recent-row">

                        @if($movie->image)

                            <img
                                src="{{ asset('storage/' . $movie->image) }}"
                                alt="{{ $movie->title }}"
                                class="recent-row__poster"
                            >

                        @else

                            <div class="recent-row__no-image">
                                🎬
                            </div>

                        @endif


                        <div class="recent-row__info">

                            <div class="recent-row__title">
                                {{ $movie->title }}
                            </div>

                            <div class="recent-row__meta">

                                {{ $movie->release_year }}

                                <span class="mx-2">
                                    •
                                </span>

                                <span class="recent-row__rating">
                                    ★ {{ $movie->rating }}
                                </span>

                            </div>

                        </div>


                        <a
                            href="{{ route('admin.movies.show', $movie) }}"
                            class="btn btn-cinema-outline btn-sm"
                        >
                            View
                        </a>

                    </div>

                @endforeach

            @else

                <div class="cinema-empty">

                    <div class="cinema-empty-icon">
                        🎬
                    </div>

                    <h3 class="fs-5 mb-2">
                        No Movies Yet
                    </h3>

                    <p class="mb-3">
                        No movies have been added yet.
                    </p>


                    <a
                        href="{{ route('admin.movies.create') }}"
                        class="btn btn-cinema"
                    >
                        Add Your First Movie
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection