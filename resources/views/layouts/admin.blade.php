<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <header>
                @include('partials.header')
            </header>
            <main>
                <div class="d-flex">
                    <div class="sidebar">
                        <!-- Sidebar -->
                        <nav id="sidebarMenu" class="d-lg-block sidebar">
                            <div class="position-sticky">
                                <div class="list-group list-group-flush mt-4 rounded">
                                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" aria-current="true" style="background-color: #FF8100">
                                        <i class="fas fa-tachometer-alt fa-fw me-2"></i>
                                        <span>Dashboard</span>
                                    </a>
                                    <a href="{{ route('admin.restaurants.index') }}" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                        <i class="fa-solid fa-utensils me-2"></i>
                                        <span>Il tuo ristorante</span>
                                    </a>
                                    @if (isset(Auth::user()->restaurant))
                                        <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                            <i class="fa-solid fa-bell-concierge me-2"></i>
                                            <span>Il tuo menù</span>
                                        </a>
                                        <div class="list-group-item list-group-item-action py-2 ripple fw-bold text-center text-white mt-5" style="background-color: #FF8100">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <span>Work in Progress</span>
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                        <div class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                            <i class="fa-solid fa-file-invoice-dollar me-2"></i>
                                            <span>I tuoi ordini</span>
                                        </div>
                                        <div class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                            <i class="fa-solid fa-chart-line me-2"></i>
                                            <span>Statistiche ordini</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </nav>
                    </div>
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