@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- User Insert Product Title -->
            <div class="col-12 text-center">
                <h1>Inserisci il nuovo Prodotto</h1>
            </div>
            <!-- User Insert Product Form -->
            <div class="col-12 my-5">
                <form action="{{ route('admin.products.store') }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Name Form Group -->
                    <div class="form-group my-4">
                        <!-- Name Label -->
                        <label class="control-label my-2">Nome:</label>
                        <!-- Name Input Text -->
                        <input type="text" name="name" id="name" placeholder="Inserisci il nome" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        <!-- Name Error Text -->
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Ingredients Form Group -->
                    <div class="form-group my-4">
                        <!-- Ingredients Label -->
                        <label class="control-label my-2">Ingredienti:</label>
                        <!-- Ingredients TextArea -->
                        <textarea name="ingredients" id="ingredients" placeholder="Inserisci gli ingredienti" class="form-control @error('ingredients') is-invalid @enderror" cols="30" rows="3">{{ old('ingredients') }}</textarea>
                        <!-- Ingredients Error Text -->
                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Price Form Group -->
                    <div class="form-group my-4">
                        <!-- Price Label -->
                        <label class="control-label my-2">Prezzo:</label>
                        <!-- Price Input Text -->
                        <input type="number" name="price" id="price" placeholder="Inserisci il prezzo" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        <!-- Price Error Text -->
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Description Form Group -->
                    <div class="form-group my-4">
                        <!-- Description Label -->
                        <label class="control-label my-2">Descrizione:</label>
                        <!-- Description TextArea -->
                        <textarea name="description" id="description" placeholder="Inserisci la Descrizione" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                        <!-- Description Error Text -->
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Visible Form Group -->
                    <div class="form-group my-4">
                        <!-- Visible Label -->
                        <label class="control-label my-2">Visibilità del prodotto:</label>
                        <!-- Visible Select -->
                        <select name="visible" id="visible" class="form-control @error('visible') is-invalid @enderror">
                            <option value="">Scegli se rendere il Prodotto Visibile ai Clienti</option>
                            <option @selected(old('visible') == 'Si') value="1">Si</option>
                            <option @selected(old('visible') == 'No') value="0">No</option>
                        </select>
                        <!-- Visible Error Text -->
                        @error('visible')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Product Cover Image Form Group -->
                    <div class="form-group my-4">
                        <!-- Cover Image Label -->
                        <label class="control-label my-2">Immagine:</label>
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
        </div>
    </div>
@endsection