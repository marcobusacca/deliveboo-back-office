@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Restaurant Create Form -->
            <div class="col-12 my-3">
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" class="card shadow-lg rounded p-2">
                    @csrf
                    <!-- Card Header -->
                    <div class="card-header bg-white py-3">
                        <!-- Create Title -->
                        <h1 class="text-center">Inserisci il tuo Ristorante</h1>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Restaurant Name Form Group -->
                        <div class="form-group my-4">
                            <!-- Name Label -->
                            <label class="control-label my-2">Nome ristorante:</label>
                            <!-- Name Input Text -->
                            <input type="text" name="name" id="name" placeholder="Inserisci il nome del ristorante" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" maxlength="50" required>
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
                            <input type="text" name="address" id="address" placeholder="Inserisci l'indirizzo del ristorante" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" maxlength="50" required>
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
                            <input type="text" name="vat" id="vat" placeholder="Inserisci partita IVA" class="form-control @error('vat') is-invalid @enderror" value="{{ old('vat') }}" minlength="11" maxlength="11" required>
                            <!-- VAT Error Text -->
                            @error('vat')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant Types Form Group -->
                        <div class="form-group my-5">
                            <!-- Restaurant Types Label -->
                            <label class="control-label my-2">Seleziona le tipologie del tuo ristorante:</label>
                            @foreach ($types as $type)
                                <div class="my-2">
                                    <!-- Types Input CheckBox -->
                                    <input type="checkbox" name="types[]" value="{{ $type->id }}" {{ in_array($type->id, old('types', [])) ? 'checked' : ''}} class="form-check-input @error('types') is-invalid @enderror">
                                    <!-- Types Label -->
                                    <label class="form-check-label">{{ $type->name }}</label>
                                </div>
                            @endforeach
                            <!-- Types Error Text -->
                            @error('types')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Project Cover Image Form Group -->
                        <div class="form-group my-4">
                            <!-- Cover Image Label -->
                            <label class="control-label my-2">Logo del Ristorante:</label>
                            <!-- Cover Image Input File -->
                            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" accept="image/jpg, image/jpeg, image/png, image/webp">
                            <!-- Cover Image Error Text -->
                            @error('cover_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Create Submit Button -->
                        <div class="col-12 d-flex justify-content-center align-items-center my-5">
                            <button type="submit" class="btn btn-success fw-bold px-5">CREA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
