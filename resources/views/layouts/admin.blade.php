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
            <nav class="top-bar navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    <div class="row w-100">
                        <div class="col-md-6 col-8">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/') }}">
                                        <img class="logo-deliveboo" src="{{ Vite::asset('resources/img/deliveboo-1.png') }}" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-4">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse d-flex justify-content-end align-items-center h-100 w-100" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                                            <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
    
            <div class="d-flex">
                <div class="sidebar">
                    <!-- Sidebar -->
                    <nav id="sidebarMenu" class="d-lg-block sidebar">
                        <div class="position-sticky">
                            <div class="list-group list-group-flush mt-4 rounded">
                                <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" aria-current="true" style="background-color: #FF8100">
                                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Il tuo ristorante</span>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Il tuo menù</span>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Statistiche ordini</span>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
    
                <div class="container-fluid">
                    <main>
                        @yield('content')
                    </main>
                </div>
    
            </div>
        </div>
    </body>
</html>