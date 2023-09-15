@extends('layouts.app') <!-- Estende il layout 'app' -->

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Tasto per tornare alla lista dei prodotti -->
        <div class="col-12 my-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-dark rounded-5 mx-3">
                <i class="fa-solid fa-arrow-left"></i> Torna alla lista dei prodotti
            </a>
        </div>

        <div class="col-md-6">
            <div class="card">
                @if (empty($product->cover_image))
                    <!-- Immagine di sostituzione -->
                    <img class="card-img-top" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="{{ $product->slug }}-immagine-di-sostituzione">
                @else
                    <!-- Immagine di copertina -->
                    <img class="card-img-top" src="{{ asset('storage/'.$product->cover_image) }}" alt="{{ $product->slug }}-immagine-di-copertina">
                @endif

                <div class="card-body">
                    <!-- Visualizzazione delle informazioni del prodotto -->
                    <h1 class="card-title">{{ $product->name }}</h1>
                    <p class="card-text">Ingredienti: {{ $product->ingredients }}</p>
                    <p class="card-text">Prezzo: ${{ number_format($product->price, 2) }}</p>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Disponibilità: {{ $product->visible == 1 ? 'Disponibile' : 'Non disponibile' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
