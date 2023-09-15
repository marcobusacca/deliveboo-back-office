@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <div class="row">
            @if (!empty($restaurant))
                <!-- Card User Restaurant -->
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="card" style="width: 35rem">
                        <!-- Restaurant Cover Image -->
                        <div class="card-header">
                            @if (!empty($restaurant->cover_image))
                                <!-- Cover Image -->
                                <img class="card-img-top rounded-5" src="{{ asset('storage/'.$restaurant->cover_image) }}" alt="{{ $restaurant->slug }}-cover-image">
                            @else
                                <!-- Place-Holder Image -->
                                <img class="card-img-top rounded-5" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="{{ $restaurant->slug }}-place-holder-image">
                            @endif
                        </div>
                        <!-- Restaurant Details -->
                        <div class="card-body">
                            <h3 class="mb-3">{{ $restaurant->name }}</h3>
                            <div class="mb-3">
                                <i class="fas fa-map"></i>
                                <span class="mx-1">{{ $restaurant->address }}</span>
                            </div>
                        </div>
                        <!-- Restaurant Actions -->
                        <div class="card-footer text-center">
                            <!-- Restaurant Show Button -->
                            <a href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-info mx-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Restaurant Edit Button -->
                            <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-warning mx-1">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection