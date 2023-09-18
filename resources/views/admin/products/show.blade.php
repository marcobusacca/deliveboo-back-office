@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <!-- Redirect To Products List -->
            <div class="col-12">
                <a href="{{ route('admin.products.index') }}" class="bg-black btn btn-dark rounded-5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Torna alla lista dei prodotti</span>
                </a>
            </div>
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-6 mt-5">
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Card Restaurant Product -->
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 35rem">
                    <!-- Product Cover Image -->
                    <div class="card-header">
                        @if (empty($product->cover_image))
                            <!-- Place-Holder Image -->
                            <img class="card-img-top" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="product-place-holder-image">
                        @else
                            <!-- Cover Image -->
                            <img class="card-img-top" src="{{ asset('storage/'.$product->cover_image) }}" alt="product-cover-image">
                        @endif
                    </div>
                    <!-- Product Details -->
                    <div class="card-body">
                        <!-- Product Name -->
                        <h3 class="mb-3">{{ $product->name }}</h3>
                        <!-- Product Ingredients -->
                        <div class="mb-3">
                            <!-- Product Ingredients Icon -->
                            <i class="fa-solid fa-plate-wheat"></i>
                            <!-- Product Ingredients Text -->
                            <span class="mx-1">{{ $product->ingredients }}</span>
                        </div>
                        <!-- Product Price -->
                        <div class="mb-3">
                            <!-- Product Price Icon -->
                            <i class="fa-solid fa-tag"></i>
                            <!-- Product Price Text -->
                            <span class="mx-1">{{ $product->price }}€</span>
                        </div>
                        <!-- Product Description -->
                        <div class="mb-3">
                            <!-- Product Description Icon -->
                            <i class="fa-solid fa-circle-info"></i>
                            <!-- Product Description Text -->
                            <span class="mx-1">{{ $product->description }}</span>
                        </div>
                        <!-- Product Visibility -->
                        <div class="mb-3">
                            <!-- Product Visibility Text -->
                            <span class="mx-1">Disponibile: {{ $product->visible == 1 ? 'Si' : 'No' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection