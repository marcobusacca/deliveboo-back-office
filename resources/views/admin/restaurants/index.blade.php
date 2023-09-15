@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            @if (!empty($restaurant))
                <!-- Card User Restaurant -->
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="card" style="width: 35rem">
                        <!-- Restaurant Cover Image -->
                        <div class="card-header">
                            @if (!empty($restaurant->cover_image))
                                <!-- Cover Image -->
                                <img class="card-img-top rounded-5" src="{{ asset('storage/'.$restaurant->cover_image) }}" alt="{{ $restaurant->slug }}-cover-image">
                            @else
                                <!-- Place-Holder Image -->
                                <img class="card-img-top rounded-5" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="{{ $restaurant->slug }}-place-holder-image">
                            @endif
                        </div>
                        <!-- Restaurant Details -->
                        <div class="card-body">
                            <h3 class="mb-3">{{ $restaurant->name }}</h3>
                            <div class="mb-3">
                                <i class="fas fa-map"></i>
                                <span class="mx-1">{{ $restaurant->address }}</span>
                            </div>
                        </div>
                        <!-- Restaurant Actions -->
                        <div class="card-footer text-center">
                            <!-- Restaurant Show Button -->
                            <a href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-info mx-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Restaurant Edit Button -->
                            <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-warning mx-1">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- User Insert Restaurant Title -->
                <div class="col-12 text-center">
                    <h1>Inserisci il tuo Ristorante</h1>
                </div>
                <!-- User Insert Restaurant Form -->
                <div class="col-12 my-5">
                    <form action="{{ route('admin.restaurants.store') }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                        @csrf
                        <!-- Restaurant Name Form Group -->
                        <div class="form-group my-4">
                            <!-- Name Label -->
                            <label class="control-label my-2">Nome ristorante:</label>
                            <!-- Name Input Text -->
                            <input type="text" name="name" id="name" placeholder="Inserisci il nome del ristorante" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            <!-- Name Error Text -->
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant Address Form Group -->
                        <div class="form-group my-4">
                            <!-- Address Label -->
                            <label class="control-label my-2">Indirizzo ristorante:</label>
                            <!-- Address Input Text -->
                            <input type="text" name="address" id="address" placeholder="Inserisci l'indirizzo del ristorante" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                            <!-- Address Error Text -->
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant VAT Form Group -->
                        <div class="form-group my-4">
                            <!-- VAT Label -->
                            <label class="control-label my-2">Partita IVA:</label>
                            <!-- VAT Input Text -->
                            <input type="text" name="vat" id="vat" placeholder="Inserisci partita IVA" class="form-control @error('vat') is-invalid @enderror" value="{{ old('vat') }}">
                            <!-- VAT Error Text -->
                            @error('vat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant Cover Image Form Group -->
                        <div class="form-group my-4">
                            <!-- Cover Image Label -->
                            <label class="control-label my-2">Logo del Ristorante:</label>
                            <!-- Cover Image Input File -->
                            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                            <!-- Cover Image Error Text -->
                            @error('cover_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Create Submit Button -->
                        <div class="col-12 d-flex justify-content-center align-items-center my-5">
                            <button type="submit" class="btn btn-success fw-bold px-5">CREA</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection