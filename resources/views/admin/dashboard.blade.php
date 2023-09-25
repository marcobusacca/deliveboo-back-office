@extends('layouts.admin')

@section('content')
    <!-- Dashboard Container -->
    <div class="container">
        <!-- Dashboard Row -->
        <div class="row justify-content-center">
            @if (session('error'))
                <!-- Operation not Authorized Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            <!-- Dashboard Col -->
            <div class="col-12">
                <!-- Dashboard Card -->
                <div class="card shadow bg-body-tertiary rounded p-4">
                    <!-- Card Title -->
                    <h1 class="my-2">Benvenuto {{ $user->name }}</h1>
                    <!-- Card SubTitle -->
                    <span>Grazie alla nostra piattaforma i clienti potranno gustare i tuoi piatti direttamente a casa!</span>
                    @if (isset(Auth::user()->restaurant))
                        <!-- Card Instructions -->
                        <div class="instructions py-4">
                            <!-- Card Instructions Title -->
                            <span>In questa area personale puoi:</span>
                            <!-- Card Instructions List -->
                            <ul class="my-3">
                                <li class="py-2">
                                    <span>Inserire e visualizzare i dati del tuo ristorante, cliccando sulla voce:</span>
                                    <a href="{{ route('admin.restaurants.index') }}" class="dashboard-link text-orange fw-bold">"Il tuo ristorante"</a>
                                </li>
                                <li class="py-2">
                                    <span>Visualizzare il tuo menù, inserire nuovi piatti, modificarli ed eventualmente eliminare quelli fuori menù, dalla voce:</span>
                                    <a href="{{ route('admin.products.index') }}" class="dashboard-link text-orange fw-bold">"Il tuo menù"</a>
                                </li>
                                <li class="list-unstyled py-2 mt-5">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <span>Work in Progress</span>
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                </li>
                                <li class="py-2">
                                    <span>Visualizzare gli ordini dei clienti, cliccando sulla voce:</span>
                                    <a href="" class="dashboard-link text-orange fw-bold">"I tuoi ordini"</a>
                                </li>
                                <li class="py-2">
                                    <span>Visualizzare le statistiche dei tuoi ordini, dalla voce:</span>
                                    <a href="" class="dashboard-link text-orange fw-bold">"Statistiche ordini"</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    @if (!isset(Auth::user()->restaurant))
                        <!-- Card Redirect to Restaurant Create -->
                        <div class="text-center my-5">
                            <a href="{{ Route('admin.restaurants.create') }}" class="btn btn-success button-color mx-3">Completa il tuo profilo</a>
                        </div>
                    @endif
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
