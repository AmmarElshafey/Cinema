<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Admin Dashboard | Cinema')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="admin-shell">

        {{-- Mobile Overlay --}}
        <div
            class="admin-sidebar-overlay"
            id="sidebarOverlay"
        ></div>


        {{-- Sidebar --}}
        <aside class="admin-sidebar" id="adminSidebar">

            <div class="admin-sidebar__brand">

                <div class="admin-sidebar__brand-mark">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect x="2.5" y="4" width="19" height="16" rx="2"></rect>
                        <line x1="7" y1="4" x2="7" y2="20"></line>
                        <line x1="17" y1="4" x2="17" y2="20"></line>
                        <line x1="2.5" y1="9" x2="7" y2="9"></line>
                        <line x1="2.5" y1="15" x2="7" y2="15"></line>
                        <line x1="17" y1="9" x2="21.5" y2="9"></line>
                        <line x1="17" y1="15" x2="21.5" y2="15"></line>
                    </svg>

                </div>

                <div class="admin-sidebar__brand-text">

                    <span class="admin-sidebar__brand-title">
                        Cinema
                    </span>

                    <span class="admin-sidebar__brand-sub">
                        Admin Panel
                    </span>

                </div>


                <button
                    type="button"
                    class="admin-sidebar__close"
                    id="sidebarClose"
                    aria-label="Close menu"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                    >
                        <line x1="5" y1="5" x2="19" y2="19"></line>
                        <line x1="19" y1="5" x2="5" y2="19"></line>
                    </svg>

                </button>

            </div>


            <div class="admin-sidebar__divider"></div>


            <nav class="admin-nav">

                <div class="admin-nav-group-label">
                    Overview
                </div>


                {{-- Dashboard --}}
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
                    </svg>

                    Dashboard

                </a>


                {{-- Movies --}}
                <a
                    href="{{ route('admin.movies.index') }}"
                    class="admin-nav-link {{ request()->routeIs('admin.movies.*') ? 'active' : '' }}"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
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

            </nav>


            <div class="admin-sidebar__footer">

                <form
                    method="POST"
                    action="{{ route('admin.logout') }}"
                    class="m-0"
                >

                    @csrf

                    <button
                        type="submit"
                        class="admin-logout-btn"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>

                        Logout

                    </button>

                </form>

            </div>

        </aside>


        {{-- Main --}}
        <div class="admin-main">

            {{-- Topbar --}}
            <header class="admin-topbar">

                <div class="d-flex align-items-center gap-3">

                    <button
                        type="button"
                        class="admin-topbar__toggle"
                        id="sidebarToggle"
                        aria-label="Open menu"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        >
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>

                    </button>

                    <span class="admin-topbar__eyebrow">
                        Cinema Admin
                    </span>

                </div>

                <span class="admin-topbar__date d-none d-sm-inline">
                    {{ now()->format('l, F j, Y') }}
                </span>

            </header>


            {{-- Content --}}
            <main class="admin-content">

                @yield('content')

            </main>


            {{-- Footer --}}
            <footer class="admin-footer">

                <small>
                    © {{ date('Y') }} Ammar Cinema Admin Panel
                </small>

            </footer>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var toggleBtn = document.getElementById('sidebarToggle');
            var closeBtn = document.getElementById('sidebarClose');
            var overlay = document.getElementById('sidebarOverlay');

            function openSidebar() {
                document.body.classList.add('sidebar-open');
            }

            function closeSidebar() {
                document.body.classList.remove('sidebar-open');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', openSidebar);
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closeSidebar);
            }

            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

        });
    </script>

</body>

</html>