@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <div class="row">
        @if (empty($restaurant))
            <div class="col-12">
                <h1 class="display-4 text-center">Inserisci il tuo Ristorante</h1>
            </div>
            <div class="col-12 my-3">
                <form action="{{ route('admin.restaurants.store') }}" method="POST" class="card p-4" enctype="multipart/form-data">
                    @csrf
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome ristorante:</label>
                                <input type="text" name="name" id="name" placeholder="Inserisci il nome del ristorante" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Indirizzo ristorante:</label>
                                <input type="text" name="address" id="address" placeholder="Inserisci l'indirizzo del ristorante" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="vat" class="form-label">Partita IVA:</label>
                                <input type="text" name="vat" id="vat" placeholder="Inserisci partita IVA" class="form-control @error('vat') is-invalid @enderror" value="{{ old('vat') }}" required>
                                @error('vat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
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
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Logo del Ristorante:</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                                @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">CREA</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection
