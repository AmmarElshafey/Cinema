@extends('layouts.admin')

@section('title', 'Movies | Cinema Admin')

@section('content')

<div class="cinema-fade-in">

    {{-- Header --}}
    <div class="cine-header">

        <div class="cine-header__body">

            <div>

                <span class="cine-kicker">
                    Cinema Management
                </span>

                <h1 class="cine-title">
                    Movies
                </h1>

                <p class="cine-subtitle">
                    Manage your cinema movie collection.
                </p>

            </div>


            <a
                href="{{ route('admin.movies.create') }}"
                class="btn btn-cinema"
            >
                + Add Movie
            </a>

        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert-cinema-success mb-3">
            {{ session('success') }}
        </div>

    @endif


    {{-- Movies Grid --}}
    @if($movies->isNotEmpty())

        <div class="row g-4">

            @foreach($movies as $movie)

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">

                    <div class="poster-card">

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


                        <div class="poster-card__body">

                            <h5 class="poster-card__title">
                                {{ $movie->title }}
                            </h5>

                            <p class="poster-card__desc">
                                {{ $movie->description }}
                            </p>


                            <div class="poster-card__actions">


                                <a
                                    href="{{ route('admin.movies.show', $movie) }}"
                                    class="btn btn-cinema-outline btn-sm"
                                >
                                    View
                                </a>


                                <a
                                    href="{{ route('admin.movies.edit', $movie) }}"
                                    class="btn btn-cinema-gold btn-sm"
                                >
                                    Edit
                                </a>


                                <form
                                    action="{{ route('admin.movies.destroy', $movie) }}"
                                    method="POST"
                                    class="ms-auto"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-cinema-danger-ghost btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this movie?')"
                                    >
                                        Delete
                                    </button>

                                </form>

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

            <p class="mb-3">
                Your cinema doesn't have any movies yet.
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

@endsection