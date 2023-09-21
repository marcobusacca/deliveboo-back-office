<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

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
            <!-- Main Sidebar Mobile -->
            <div class="offcanvas offcanvas-start deliv-orange w-75" tabindex="-1" id="mobileSideBar" aria-labelledby="mobileSideBarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-white" id="mobileSideBarLabel">Deliveboo Menù</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    <div id="sidebarMenu" class="mobile-sidebar">
                        <div class="list-group list-group-flush mt-4">
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
                                <li class="list-group-item fw-bold text-white py-5">
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
            @yield('content')
        </main> 
    </div>
</body>

</html>
