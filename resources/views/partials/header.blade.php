<!-- Header Navbar -->
<nav class="navbar navbar-expand-lg shadow p-0 h-100">
    <div class="container-fluid navbar-container-fluid h-100">
        <!-- Navbar Hamburger -->
        <a data-bs-toggle="offcanvas" href="#mobileSideBar" role="button" aria-controls="mobileSideBar">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </a>
        <!-- Navbar Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo-deliveboo" src="{{ Vite::asset('resources/img/deliveboo-1.png') }}" alt="deliveboo-logo">
        </a>
        <!-- Navbar Item -->
        <div class="collapse navbar-collapse navbar-item" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                    <!-- Login Link -->
                    <li class="nav-item">
                        <!-- Login Button -->
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                    </li>
                @if (Route::has('register'))
                    <!-- Register Link -->
                    <li class="nav-item">
                        <!-- Register Button -->
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                @endif
                @else
                    <!-- Logout Link -->
                    <li class="nav-item">
                        <!-- Logout Button -->
                        <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <!-- Logout Icon -->
                        <i class="fas fa-door-open me-2"></i>
                        {{ __('Logout') }}
                        </a>
                        <!-- Logout Form -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>