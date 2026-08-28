<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Cinema')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    {{-- Navbar --}}
  <nav class="public-navbar">

    <div class="public-navbar__container">

        <a
            href="{{ route('home') }}"
            class="public-brand"
        >

            <span class="public-brand__mark">
                🎬
            </span>

            <span class="public-brand__text">
                Cinema
            </span>

        </a>


        <button
            type="button"
            class="public-navbar__toggle"
            id="publicNavToggle"
            aria-label="Toggle menu"
        >

            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>

        </button>


        <div class="public-navbar__links" id="publicNavLinks">

            <a
                href="{{ route('home') }}"
                class="public-nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
            >

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2.5" y="4" width="19" height="16" rx="2"></rect>
                    <line x1="7" y1="4" x2="7" y2="20"></line>
                    <line x1="17" y1="4" x2="17" y2="20"></line>
                    <line x1="2.5" y1="9" x2="7" y2="9"></line>
                    <line x1="2.5" y1="15" x2="7" y2="15"></line>
                    <line x1="17" y1="9" x2="21.5" y2="9"></line>
                    <line x1="17" y1="15" x2="21.5" y2="15"></line>
                </svg>

                Movies

            </a>


            <span class="public-navbar__divider"></span>


            <a
                href="{{ route('admin.login') }}"
                class="public-nav-link  {{ request()->routeIs('admin.login') ? 'active' : '' }}"
            >

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                    <polyline points="10 17 15 12 10 7"></polyline>
                    <line x1="15" y1="12" x2="3" y2="12"></line>
                </svg>

                Admin Login

            </a>


            <a
                href="{{ route('admin.signup') }}"
                class="public-nav-link  {{ request()->routeIs('admin.signup') ? 'active' : '' }}"
            >
                Admin Sign Up
            </a>

        </div>

    </div>

</nav>


    {{-- Hero (homepage only) --}}
    @if(request()->routeIs('home'))

        <section class="public-hero">

            <div class="public-hero__content">

                <span class="cine-kicker">
                    Welcome to Cinema
                </span>

                <h1 class="public-hero__title">

                    Discover Your Next

                    <span>
                        Favorite Movie.
                    </span>

                </h1>

                <p class="public-hero__subtitle">
                  Find the story that stays with you.
                </p>

            </div>

        </section>

    @endif


    {{-- Content --}}
    <main>

        <div class="public-main">

            @yield('content')

        </div>

    </main>


    {{-- Footer --}}
    <footer class="public-footer">

        <p class="m-0">
            © {{ date('Y') }} Cinema. All rights reserved.
        </p>

    </footer>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toggleBtn = document.getElementById('publicNavToggle');
            var links = document.getElementById('publicNavLinks');

            if (toggleBtn && links) {
                toggleBtn.addEventListener('click', function () {
                    links.classList.toggle('is-open');
                });
            }
        });
    </script>

</body>

</html>