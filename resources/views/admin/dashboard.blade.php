@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
                    <div class="p-3">
                        <h1>Benvenuto {{ $user->name }}</h1>
                        <p>Utilizzando la nostra piattaforma potrai permettere ai clienti di gustare i tuoi piatti direttamente a casa</p>
                        <div class="instructions">
                            <ul class="list-group">
                                <li class="list-group-item">Inserire e visualizzare i dati del tuo ristorante cliccando sulla voce</li>
                                <li class="list-group-item">Inserire e visualizzare i dati del tuo ristorante cliccando sulla voce</li>
                                <li class="list-group-item">Inserire e visualizzare i dati del tuo ristorante cliccando sulla voce</li>
                                <li class="list-group-item">Inserire e visualizzare i dati del tuo ristorante cliccando sulla voce</li>
                            </ul>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                        @if (!isset(Auth::user()->restaurant))
                            <div class="col-12 text-center my-5">
                                <a href="{{ Route('admin.restaurants.index') }}" class="btn btn-success button-color mx-3">Completa il tuo profilo</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
