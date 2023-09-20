@extends('layouts.app')

@section('content')
    <div class="jumbotron p-5 mb-4 rounded-3">
        <div class="container card shadow bg-body-tertiary py-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="text-center p-3">
                        @if (Auth::user())
                            <h1 class="mb-3">Benvenuto nella tua pagina personale Deliveboo</h1>
                        @else
                            <h1 class="mb-3">Benvenuto nella piattaforma ristoranti Deliveboo</h1>
                        @endif
                        <h4 class="mb-3">Unisciti alla comunity di Deliveboo</h4>
                        <p class="">Insieme possiamo aiutarti a raggiungere sempre più clienti!</p>
                    </div>
                </div>
                @if (Auth::user())
                    <div class="col-12 text-center">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-success button-color">Accedi alla tua Dashboard</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="container card shadow bg-body-tertiary p-4 my-5">
            <div class="row align-items-center">
                <div class="text-center">
                    <h1 class="mb-5">Cosa puoi fare</h1>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="text-center">
                        <i class="fa-solid fa-circle-info fa-xl mb-4"></i>
                        <p>Gestire il tuo ristorante e i tuoi prodotti</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="text-center">
                        <i class="fa-solid fa-receipt fa-2xl mb-4"></i>
                        <p>Controllare le ordinazioni in maniera efficiente</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="text-center">
                        <i class="fa-solid fa-ranking-star fa-2xl mb-4"></i>
                        <p>Visionare le statistiche dei tuoi ordini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection