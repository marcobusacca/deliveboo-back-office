@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (empty($restaurant))
                <div class="col-12">
                    <h1>utente no ristorante</h1>
                </div>
                
            @else
                <div class="col-12">
                    <h1>utente con ristorante</h1>

                </div>
            @endif

        </div>
    </div>
@endsection