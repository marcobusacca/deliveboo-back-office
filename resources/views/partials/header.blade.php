<!-- Header Navbar -->
<nav class="navbar navbar-expand-md navbar-light shadow p-0 h-100">
    <div class="container-fluid px-5">
        <div class="row w-100">
            <div class="col-6">
                <!-- Navbar Logo -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <img class="logo-deliveboo" src="{{ Vite::asset('resources/img/deliveboo-1.png') }}" alt="deliveboo-logo">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6">
                <!-- Navbar Hamburger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Item -->
                <div class="collapse navbar-collapse d-flex justify-content-end align-items-center h-100 w-100" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- Login Link -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                        @if (Route::has('register'))
                            <!-- Register Link -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                        @else
                        <!-- Logout Link -->
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>