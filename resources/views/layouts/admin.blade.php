<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Deliveboo - gestisci il tuo ristorante') }}</title>

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <!-- Header -->
            <header>
                @include('partials.header')
            </header>
            <!-- Main -->
            <main class="admin-main">
                <div class="d-flex">
                    <!-- Main Sidebar Mobile -->
                    <div class="offcanvas offcanvas-start deliv-orange w-75" tabindex="-1" id="mobileSideBar" aria-labelledby="mobileSideBarLabel">
                        <div class="offcanvas-header">
                            <a href="{{ url('/') }}" class="text-decoration-none">
                                <h5 class="offcanvas-title text-white" id="mobileSideBarLabel">Deliveboo</h5>
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-0">
                            <div id="sidebarMenu" class="mobile-sidebar">
                                <div class="list-group list-group-flush mt-4">
                                    <!-- Dashboard -->
                                    <a href="{{ route('admin.dashboard') }}" class="list-group-item fw-bold text-white py-2 @if(Route::currentRouteName() == 'admin.dashboard') active-sidebar-route @endif">
                                        <!-- Dashboard Icon -->
                                        <i class="fas fa-tachometer-alt fa-fw me-2"></i>
                                        <!-- Dashboard Text -->
                                        <span>Dashboard</span>
                                    </a>
                                    @if (isset(Auth::user()->restaurant))
                                        <!-- Il tuo ristorante -->
                                        <a href="{{ route('admin.restaurants.index') }}" class="list-group-item fw-bold text-white py-2 @if(Route::currentRouteName() == 'admin.restaurants.index') active-sidebar-route @endif">
                                            <!-- Il tuo ristorante Icon -->
                                            <i class="fa-solid fa-utensils me-2"></i>
                                            <!-- Il tuo ristorante Text -->
                                            <span>Il tuo ristorante</span>
                                        </a>
                                        <!-- Il tuo menù -->
                                        <a href="{{ route('admin.products.index') }}" class="list-group-item fw-bold text-white py-2 @if(Route::currentRouteName() == 'admin.products.index') active-sidebar-route @endif">
                                            <!-- Il tuo menù Icon -->
                                            <i class="fa-solid fa-bell-concierge me-2"></i>
                                            <!-- Il tuo menù Text -->
                                            <span>Il tuo menù</span>
                                        </a>
                                        <!-- Work in Progress -->
                                        <div class="list-group-item fw-bold text-center text-white py-2 mt-5">
                                            <!-- Work in Progress Icon -->
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <!-- Work in Progress Text -->
                                            <span>Work in Progress</span>
                                            <!-- Work in Progress Icon -->
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                        <!-- I tuoi ordini -->
                                        <div class="list-group-item fw-bold text-white py-2">
                                            <!-- I tuoi ordini Icon -->
                                            <i class="fa-solid fa-file-invoice-dollar me-2"></i>
                                            <!-- I tuoi ordini Text -->
                                            <span>I tuoi ordini</span>
                                        </div>
                                        <!-- Statistiche ordini -->
                                        <div class="list-group-item fw-bold text-white py-2">
                                            <!-- Statistiche ordini Icon -->
                                            <i class="fa-solid fa-chart-line me-2"></i>
                                            <!-- Statistiche ordini Text -->
                                            <span>Statistiche ordini</span>
                                        </div>
                                    @endif
                                    @guest
                                        <!-- Login Link -->
                                        <li class="list-group-item fw-bold text-white py-2">
                                            <!-- Login Button -->
                                            <a class="text-white text-decoration-none" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                                        </li>
                                    @if (Route::has('register'))
                                        <!-- Register Link -->
                                        <li class="list-group-item fw-bold text-white py-2">
                                            <!-- Register Button -->
                                            <a class="text-white text-decoration-none" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                        </li>
                                    @endif
                                    @else
                                        <!-- Logout Link -->
                                        <li class="list-group-item fw-bold text-white my-3">
                                            <!-- Logout Icon -->
                                            <i class="fas fa-door-open me-2"></i>
                                            <!-- Logout Button -->
                                            <a class="text-white text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            <!-- Logout Form -->
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main Sidebar Desktop -->
                    <div id="sidebarMenu" class="desktop-sidebar shadow">
                        <div class="list-group list-group-flush mt-4">
                            <!-- Dashboard -->
                            <a href="{{ route('admin.dashboard') }}" class="list-group-item fw-bold text-white py-2 @if(Route::currentRouteName() == 'admin.dashboard') active-sidebar-route @endif">
                                <!-- Dashboard Icon -->
                                <i class="fas fa-tachometer-alt fa-fw me-2"></i>
                                <!-- Dashboard Text -->
                                <span>Dashboard</span>
                            </a>
                            @if (isset(Auth::user()->restaurant))
                                <!-- Il tuo ristorante -->
                                <a href="{{ route('admin.restaurants.index') }}" class="list-group-item fw-bold text-white py-2 @if(Route::currentRouteName() == 'admin.restaurants.index') active-sidebar-route @endif">
                                    <!-- Il tuo ristorante Icon -->
                                    <i class="fa-solid fa-utensils me-2"></i>
                                    <!-- Il tuo ristorante Text -->
                                    <span>Il tuo ristorante</span>
                                </a>
                                <!-- Il tuo menù -->
                                <a href="{{ route('admin.products.index') }}" class="list-group-item fw-bold text-white py-2 @if(Route::currentRouteName() == 'admin.products.index') active-sidebar-route @endif">
                                    <!-- Il tuo menù Icon -->
                                    <i class="fa-solid fa-bell-concierge me-2"></i>
                                    <!-- Il tuo menù Text -->
                                    <span>Il tuo menù</span>
                                </a>
                                <!-- Work in Progress -->
                                <div class="list-group-item fw-bold text-center text-white py-2 mt-5">
                                    <!-- Work in Progress Icon -->
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <!-- Work in Progress Text -->
                                    <span>Work in Progress</span>
                                    <!-- Work in Progress Icon -->
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </div>
                                <!-- I tuoi ordini -->
                                <div class="list-group-item fw-bold text-white py-2">
                                    <!-- I tuoi ordini Icon -->
                                    <i class="fa-solid fa-file-invoice-dollar me-2"></i>
                                    <!-- I tuoi ordini Text -->
                                    <span>I tuoi ordini</span>
                                </div>
                                <!-- Statistiche ordini -->
                                <div class="list-group-item fw-bold text-white py-2">
                                    <!-- Statistiche ordini Icon -->
                                    <i class="fa-solid fa-chart-line me-2"></i>
                                    <!-- Statistiche ordini Text -->
                                    <span>Statistiche ordini</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Main Content -->
                    <div class="main-content">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>