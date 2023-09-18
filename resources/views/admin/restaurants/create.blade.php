@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-3">
                <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow-lg rounded">
                        <div class="card-header bg-white py-3">
                            <h1 class="text-center">Inserisci il tuo Ristorante</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome ristorante:</label>
                                <input type="text" name="name" id="name" placeholder="Inserisci il nome del ristorante" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Indirizzo ristorante:</label>
                                <input type="text" name="address" id="address" placeholder="Inserisci l'indirizzo del ristorante" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="vat" class="form-label">Partita IVA:</label>
                                <input type="text" name="vat" id="vat" placeholder="Inserisci partita IVA" class="form-control @error('vat') is-invalid @enderror" value="{{ old('vat') }}">
                                @error('vat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Seleziona le tipologie del tuo ristorante:</label>
                                <div class="form-check">
                                    @foreach ($types as $type)
                                        <input type="checkbox" name="types[]" value="{{ $type->id }}" {{ in_array($type->id, old('types', [])) ? 'checked' : ''}} class="form-check-input @error('types') is-invalid @enderror">
                                        <label class="form-check-label">{{ $type->name }}</label><br>
                                    @endforeach
                                </div>
                                @error('types')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="cover_image" class="form-label">Logo del Ristorante:</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                                @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success button-color px-5">CREA</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
