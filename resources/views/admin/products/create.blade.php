@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Redirect To Products List -->
            <div class="col-12 redirect-back-btn">
                <a href="{{ route('admin.products.index') }}" class="bg-black btn btn-dark rounded-5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Torna alla lista dei prodotti</span>
                </a>
            </div>
            @if (session('error'))
                <!-- Operation not Authorized Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            <!-- Product Create Form -->
            <div class="col-12 my-3">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="card shadow bg-body-tertiary p-2">
                    @csrf
                    <!-- Card Header -->
                    <div class="card-header bg-white py-3">
                        <!-- Create Title -->
                        <h1 class="text-center">Inserisci il tuo Prodotto</h1>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Product Name Form Group -->
                        <div class="form-group my-4">
                            <!-- Name Label -->
                            <label class="control-label my-2">Nome *</label>
                            <!-- Name Input Text -->
                            <input type="text" name="name" id="name" placeholder="Inserisci il nome" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" maxlength="50" required>
                            <!-- Name Error Text -->
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Product Ingredients Form Group -->
                        <div class="form-group my-4">
                            <!-- Ingredients Label -->
                            <label class="control-label my-2">Ingredienti *</label>
                            <!-- Ingredients TextArea -->
                            <textarea name="ingredients" id="ingredients" placeholder="Inserisci gli ingredienti" class="form-control @error('ingredients') is-invalid @enderror" cols="30" rows="3" maxlength="255" required>{{ old('ingredients') }}</textarea>
                            <!-- Ingredients Error Text -->
                            @error('ingredients')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Product Price Form Group -->
                        <div class="form-group my-4">
                            <!-- Price Label -->
                            <label class="control-label my-2">Prezzo *</label>
                            <!-- Price Input Text -->
                            <input type="number" step="any" name="price" id="price" placeholder="Inserisci il prezzo" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" min="0.10" required>
                            <!-- Price Error Text -->
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Product Description Form Group -->
                        <div class="form-group my-4">
                            <!-- Description Label -->
                            <label class="control-label my-2">Descrizione</label>
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
                            <label class="control-label my-2">Prodotto Disponibile *</label>
                            <!-- Visible Select -->
                            <select name="visible" id="visible" class="form-control @error('visible') is-invalid @enderror" required>
                                <option value="">Scegli se rendere il Prodotto Visibile ai Clienti</option>
                                <option @selected(old('visible') == "1") value="1">Si</option>
                                <option @selected(old('visible') == "0") value="0">No</option>
                            </select>
                            <!-- Visible Error Text -->
                            @error('visible')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Product Cover Image Form Group -->
                        <div class="form-group my-4">
                            <!-- Cover Image Label -->
                            <label class="control-label my-2">Immagine</label>
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