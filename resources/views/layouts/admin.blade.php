<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Deliveboo') }}</title>

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
            <main>
                <div class="d-flex">
                    <!-- Main Sidebar -->
                    <nav id="sidebarMenu" class="sidebar shadow">
                        <div class="position-sticky">
                            <div class="list-group list-group-flush mt-4">
                                <!-- Dashboard -->
                                <a href="{{ route('admin.dashboard') }}" class="list-group-item fw-bold text-white py-2">
                                    <!-- Dashboard Icon -->
                                    <i class="fas fa-tachometer-alt fa-fw me-2"></i>
                                    <!-- Dashboard Text -->
                                    <span>Dashboard</span>
                                </a>
                                <!-- Il tuo ristorante -->
                                <a href="{{ route('admin.restaurants.index') }}" class="list-group-item fw-bold text-white py-2">
                                    <!-- Il tuo ristorante Icon -->
                                    <i class="fa-solid fa-utensils me-2"></i>
                                    <!-- Il tuo ristorante Text -->
                                    <span>Il tuo ristorante</span>
                                </a>
                                @if (isset(Auth::user()->restaurant))
                                    <!-- Il tuo menù -->
                                    <a href="{{ route('admin.products.index') }}" class="list-group-item fw-bold text-white py-2">
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
                    </nav>
                    <!-- Main Content -->
                    <div class="container-fluid p-0">
                        <div class="background-image p-5 w-100 h-100">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>