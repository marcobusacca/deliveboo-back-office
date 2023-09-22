@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Redirect To Restaurants List -->
            <div class="col-12 redirect-back-btn">
                <a href="{{ route('admin.restaurants.index') }}" class="bg-black btn btn-dark rounded-5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Torna indietro</span>
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
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Restaurant Edit Form -->
            <div class="col-12 my-3">
                <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data" id="editRestaurantForm" class="card shadow bg-body-tertiary p-2">
                    @csrf
                    @method('PUT')
                    <!-- Card Header -->
                    <div class="card-header bg-white py-3">
                        <!-- Edit Title -->
                        <h1 class="text-center">Modifica {{ $restaurant->name }}</h1>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Restaurant Name Form Group -->
                        <div class="form-group my-4">
                            <!-- Name Label -->
                            <label class="control-label my-2">Nome ristorante *</label>
                            <!-- Name Input Text -->
                            <input type="text" name="name" id="name" placeholder="Modifica il nome del ristorante" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $restaurant->name }}" maxlength="50" required>
                            <!-- Name Error Text -->
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant Address Form Group -->
                        <div class="form-group my-4">
                            <!-- Address Label -->
                            <label class="control-label my-2">Indirizzo ristorante *</label>
                            <!-- Address Input Text -->
                            <input type="text" name="address" id="address" placeholder="Modifica l'indirizzo del ristorante" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $restaurant->address }}" maxlength="50" required>
                            <!-- Address Error Text -->
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant VAT Form Group -->
                        <div class="form-group my-4">
                            <!-- VAT Label -->
                            <label class="control-label my-2">Partita IVA</label>
                            <!-- VAT Input Text -->
                            <input type="text" name="vat" id="vat" placeholder="Modifica partita IVA" class="form-control @error('vat') is-invalid @enderror" value="{{ old('vat') ?? $restaurant->vat }}" disabled>
                            <!-- VAT Info Text -->
                            <span class="font-size-13">Per modificare la tua partita IVA contattaci via e-mail: support@deliveboo.it</span>
                            <!-- VAT Error Text -->
                            @error('vat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Restaurant Types Form Group -->
                        <div class="form-group my-5">
                            <!-- Restaurant Types Label -->
                            <span class="control-label my-2">Modifica le tipologie del tuo ristorante *</span>
                            @foreach ($types as $type)
                                <div class="my-2">
                                    @if ($errors->any())
                                        <!-- Types Input CheckBox -->
                                        <input type="checkbox" name="types[]" value="{{ $type->id }}" {{ in_array($type->id, old('types', [])) ? 'checked' : ''}} class="form-check-input @error('types') is-invalid @enderror">
                                    @else
                                        <!-- Types Input CheckBox -->
                                        <input type="checkbox" name="types[]" value="{{ $type->id }}" {{ $restaurant->types->contains($type) ? 'checked' : ''}} class="form-check-input @error('types') is-invalid @enderror">
                                    @endif
                                    <!-- Types Label -->
                                    <label class="form-check-label">{{ $type->name }}</label>
                                </div>
                            @endforeach
                            <!-- Types Error Text -->
                            <div id="editRestaurantTypeError" class="text-danger"></div>
                            @error('types')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Project Cover Image Form Group -->
                        <div class="form-group my-4">
                            @if (!empty($restaurant->cover_image))
                                <div class="my-4">
                                    <!-- Current Cover Image Label -->
                                    <label class="d-block my-3 control-label">Logo Attuale</label>
                                    <!-- Current Cover Image -->
                                    <img src="{{ asset('storage/'.$restaurant->cover_image) }}" alt="{{ $restaurant->slug }}-cover-image" class="d-block img-fluid w-25 border border-3 my-3">
                                    <!-- Current Cover Image Delete Button -->
                                    <a href="{{ route('admin.restaurants.edit.delete-cover-image', $restaurant) }}" class="btn btn-danger my-3">Cancella Logo</a>
                                </div>
                            @endif
                            <div class="my-4">
                                @if (!empty($restaurant->cover_image))
                                    <!-- New Cover Image Label -->
                                    <label class="control-label my-2">Nuovo Logo del Ristorante</label>
                                @else
                                    <!-- Cover Image Label -->
                                    <label class="control-label my-2">Logo del Ristorante</label>
                                @endif
                                <!-- Cover Image Input File -->
                                <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" accept="image/jpg, image/jpeg, image/png, image/webp">
                                <!-- Cover Image Error Text -->
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Edit Submit Button -->
                        <div class="col-12 d-flex justify-content-center align-items-center my-5">
                            <button type="submit" class="btn btn-warning fw-bold px-5">MODIFICA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection