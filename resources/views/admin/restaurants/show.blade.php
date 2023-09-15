@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Link To Restaurants List -->
            <div class="col-12 my-4">
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-dark rounded-5 mx-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Card User Restaurant -->
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 35rem">
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
                        <h3 class="mb-3">{{ $restaurant->name }}</h3>
                        <div class="mb-3">
                            <i class="fas fa-map"></i>
                            <span class="mx-1">{{ $restaurant->address }}</span>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-circle-info"></i>
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