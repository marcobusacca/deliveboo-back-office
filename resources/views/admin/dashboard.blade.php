@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="p-3">
                        <h1 class="my-2">Benvenuto {{ $user->name }}</h1>
                        <span>Grazie alla nostra piattaforma i clienti potranno gustare i tuoi piatti direttamente a casa!</span>
                        @if (isset(Auth::user()->restaurant))
                            <div class="instructions py-4">
                                <span>In questa area personale puoi:</span>
                                <ul class="my-3">
                                    <li class="py-2">
                                        <span>Inserire e visualizzare i dati del tuo ristorante, cliccando sulla voce:</span>
                                        <a href="{{ route('admin.restaurants.index') }}" class="text-decoration-none text-orange fw-bold">"Il tuo ristorante"</a>
                                    </li>
                                    <li class="py-2">
                                        <span>Visualizzare il tuo menù, inserire nuovi piatti, modificarli ed eventualmente eliminare quelli fuori menù, dalla voce:</span>
                                        <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-orange fw-bold">"Il tuo menù"</a>
                                    </li>
                                    <li class="list-unstyled py-2 mt-5">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <span>Work in Progress</span>
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </li>
                                    <li class="py-2">
                                        <span>Visualizzare gli ordini dei clienti, cliccando sulla voce:</span>
                                        <a href="" class="text-decoration-none text-orange fw-bold">"I tuoi ordini"</a>
                                    </li>
                                    <li class="py-2">
                                        <span>Visualizzare le statistiche dei tuoi ordini, dalla voce:</span>
                                        <a href="" class="text-decoration-none text-orange fw-bold">"Statistiche ordini"</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        @if (!isset(Auth::user()->restaurant))
                            <div class="col-12 text-center my-5">
                                <a href="{{ Route('admin.restaurants.index') }}" class="btn btn-success button-color mx-3">Completa il tuo profilo</a>
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
    </div>
@endsection
