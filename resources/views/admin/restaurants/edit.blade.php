@extends('layouts.admin')

@section('content')
    <div class="container bg-white">
        <div class="row">
            <!-- Link To Restaurants List -->
            <div class="col-12 my-4">
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-dark rounded-5 mx-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            <!-- Edit Title With Restaurant Name -->
            <div class="col-6 d-flex justify-content-start align-items-end mt-5">
                <h1>Modifica il Ristorante "{{ $restaurant->name }}"</h1>
            </div>
            <!-- Edit Form -->
            <div class="col-12 my-5">
                <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Restaurant Name Form Group -->
                    <div class="form-group my-4">
                        <!-- Name Label -->
                        <label class="control-label my-2">Nome ristorante:</label>
                        <!-- Name Input Text -->
                        <input type="text" name="name" id="name" placeholder="Modifica il nome del ristorante" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $restaurant->name }}">
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
                        <input type="text" name="address" id="address" placeholder="Modifica l'indirizzo del ristorante" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $restaurant->address }}">
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
                        <input type="text" name="vat" id="vat" placeholder="Modifica partita IVA" class="form-control @error('vat') is-invalid @enderror" value="{{ old('vat') ?? $restaurant->vat }}">
                        <!-- VAT Error Text -->
                        @error('vat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Project Cover Image Form Group -->
                    <div class="form-group my-4">
                        @if (!empty($restaurant->cover_image))
                            <div class="my-5">
                                <!-- Current Cover Image Label -->
                                <label class="d-block my-3 control-label">Copertina Attuale:</label>
                                <!-- Current Cover Image -->
                                <img src="{{ asset('storage/'.$restaurant->cover_image) }}" alt="{{ $restaurant->slug }}-cover-image" class="d-block img-fluid w-25 border border-3 my-3">
                                <!-- Current Cover Image Delete Button -->
                                <a href="{{ route('admin.restaurants.edit.delete-cover-image', $restaurant) }}" class="btn btn-danger my-5">Cancella Copertina</a>
                            </div>
                        @endif
                        <div class="my-5">
                            @if (!empty($restaurant->cover_image))
                                <!-- New Cover Image Label -->
                                <label class="control-label my-2">Nuova Copertina:</label>
                            @else
                                <!-- Cover Image Label -->
                                <label class="control-label my-2">Copertina:</label>
                            @endif
                            <!-- Cover Image Input File -->
                            <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
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
                </form>
            </div>
        </div>
    </div>
@endsection