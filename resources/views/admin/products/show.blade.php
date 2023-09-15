@extends('layouts.app') <!-- Estende il layout 'app' -->

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Link per tornare alla lista dei prodotti -->
        <div class="col-12 my-4">
            <a href="{{ route('admin.products.index') }}" class="btn btn-dark rounded-5 mx-3">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        @if (empty($product->cover_image))
            <!-- Immagine di sostituzione -->
            <img class="card-img-top" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="{{ $product->slug }}-immagine-di-sostituzione">
        @else
            <!-- Immagine di copertina -->
            <img class="card-img-top" src="{{ asset('storage/'.$product->cover_image) }}" alt="{{ $product->slug }}-immagine-di-copertina">
        @endif

        <!-- Visualizzazione delle informazioni del prodotto -->
        <div>Nome: {{ $product->name }}</div>
        <div>Ingredienti: {{ $product->ingredients }}</div>
        <div>Prezzo: {{ $product->price }}</div>
        <div>Descrizione: {{ $product->description }}</div>
        <div>Disponibilità: {{ $product->visible == 1 ? 'si' : 'no' }}</div>
    </div>
</div>
@endsection