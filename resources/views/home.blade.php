@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 rounded-3">
    <div class="container card py-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="row">
            <div class="col-12">
                <div class="text-center p-3">
                    <h1 class="mb-3">Benvenuto nella tua pagina personale Deliveboo</h1>
                    <h4 class="mb-3">Unisciti alla comunity di Deliveboo</h4>
                    <p class="">Insieme possiamo aiutarti a raggiungere sempre più clienti</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container card mt-5 p-4 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
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
            <div class="text-center">
                <a href="{{ url('admin') }}">
                    <button type="button" class="btn btn-primary mt-4">Accedi alla tua dashboard</button>
                </a>
            </div>
        </div>
    </div>

</div>


@endsection