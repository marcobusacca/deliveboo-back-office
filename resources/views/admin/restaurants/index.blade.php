@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            @if (!empty($restaurant))
                <!-- Card User Restaurant -->
                <div class="col-12">
                    <h1>utente con ristorante</h1>
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
                            <label class="control-label my-2">Nome:</label>
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
                            <label class="control-label my-2">Indirizzo:</label>
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