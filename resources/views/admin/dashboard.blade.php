@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-3 box-shadow">
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

                    <div class="col-12 text-center my-5">
                        <a href="{{ Route('admin.restaurants.index') }}" class="btn btn-primary mx-3">Completa il tuo profilo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
