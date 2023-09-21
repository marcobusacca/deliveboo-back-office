<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Font Montserrat -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <title>{{ config('app.name', 'Deliveboo') }}</title>

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div id="app">
            <main class="error-main">
                <div class="container-fluid h-100">
                    <div class="row h-100">
                        <div class="col-12 col-lg-8 errors-background h-100">
                        </div>
                        <div class="col-12 col-lg-4 h-100">
                            <div class="row flex-column justify-content-between pt-5 h-100">
                                <div class="col-12 text-center py-5">
                                    <h1 class="error-title text-orange fw-bold my-3">404</h1>
                                    <h2 class="fs-4 fw-bold my-3">PAGE NOT FOUND</h2>
                                    <p class="mt-5">
                                        Questa non è la pagina che stai cercando!
                                    </p>
                                    <a href="{{ route('home') }}" class="btn btn-dark deliv-orange text-white border-0 mt-2 w-75">Home</a>
                                </div>
                                <div class="col-12 text-center py-3">
                                    <span class="error-deliveboo-copyright">2023 &copy; Deliveboo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
