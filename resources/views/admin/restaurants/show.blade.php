@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <!-- Redirect To Restaurants List -->
            <div class="col-12 redirect-back-btn">
                <a href="{{ route('admin.restaurants.index') }}" class="bg-black btn btn-dark rounded-5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Torna indietro</span>
                </a>
            </div>
            @if (session('error'))
                <!-- Operation not Authorized Message -->
                <div class="col-12 col-lg-6 mt-5">
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-12 col-lg-6 mt-5">
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Card User Restaurant -->
            <div class="col-12 d-flex justify-content-center align-items-center my-3">
                <div class="card shadow bg-body-tertiary" style="width: 35rem">
                    <!-- Restaurant Cover Image -->
                    <div class="card-header">
                        @if (empty($restaurant->cover_image))
                            <!-- Place-Holder Image -->
                            <img class="card-img-top" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="{{ $restaurant->slug }}-place-holder-image">
                        @else
                            <!-- Cover Image -->
                            <img class="card-img-top" src="{{ asset('storage/'.$restaurant->cover_image) }}" alt="{{ $restaurant->slug }}-cover-image">
                        @endif
                    </div>
                    <!-- Restaurant Details -->
                    <div class="card-body">
                        <!-- Restaurant Name -->
                        <h3 class="mb-3">{{ $restaurant->name }}</h3>
                        <!-- Restaurant Address -->
                        <div class="mb-3">
                            <!-- Restaurant Address Icon -->
                            <i class="fas fa-map"></i>
                            <!-- Restaurant Address Text -->
                            <span class="mx-1">{{ $restaurant->address }}</span>
                        </div>
                        <!-- Restaurant Vat -->
                        <div class="mb-3">
                            <!-- Restaurant Vat Icon -->
                            <i class="fa-solid fa-circle-info"></i>
                            <!-- Restaurant Vat Text -->
                            <span class="mx-1">{{ $restaurant->vat }}</span>
                        </div>
                        <!-- Restaurant Types -->
                        <div class="mb-3">
                            @if (count($restaurant->types) != 0)
                                <!-- Types Label -->
                                <label class="fw-bold">Tipologia:</label>
                                <!-- List of Types -->
                                @foreach ($restaurant->types as $index => $type)
                                    @if ($index != count($restaurant->types) - 1)
                                        <!-- Type Name -->
                                        <span>{{ $type->name }}</span>
                                        <span> • </span>
                                    @else
                                        <!-- Type Name -->
                                        <span>{{ $type->name }}</span>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection