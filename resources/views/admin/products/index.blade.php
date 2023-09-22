@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('error'))
                <!-- Operation not Authorized Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            <!-- Products Infos Table -->
            <div class="col-12 p-0">
                <table class="table table-striped shadow bg-body-tertiary">
                    <thead>
                        <tr class="text-center">
                            <th>Anteprima</th>
                            <th>Nome</th>
                            <th>Visibile</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($products as $product)
                            <tr class="text-center">
                                <!-- Product Preview -->
                                <td class="w-25">
                                    @if (empty($product->cover_image))
                                        <!-- Place-Holder Image -->
                                        <img class="card-img-top w-50" src="{{ Vite::asset('resources/img/placeholder-image.jpg') }}" alt="product-place-holder-image">
                                    @else
                                        <!-- Cover Image -->
                                        <img class="card-img-top w-50" src="{{ asset('storage/'.$product->cover_image) }}" alt="product-cover-image">
                                    @endif
                                </td>
                                <!-- Product Name -->
                                <td>{{ $product->name }}</td>
                                <!-- Product Price -->
                                <td>{{ $product->visible ? 'Si' : 'No' }}</td>
                                <!-- Product Tools -->
                                <td>
                                    <!-- Product Show Button -->
                                    <a href="{{ route('admin.products.show', $product) }}" class="products-tools-btn btn btn-info mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Product Edit Button -->
                                    <a href="{{ route('admin.products.edit', $product) }}" class="products-tools-btn btn btn-warning mx-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Product Delete Button -->
                                    <form class="products-tools-btn product-delete-button d-inline-block mx-1" data-product-name="{{ $product->name }}" action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Product Create Button -->
                        <tr class="text-center">
                            <td colspan="4" class="py-4">
                                <a href="{{ route('admin.products.create') }}" class="text-decoration-none">Inserisci un nuovo prodotto</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.partials.modal_product_delete');
@endsection