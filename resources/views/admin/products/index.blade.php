@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Products Infos Table -->
            <div class="col-12">
                <table class="table table-striped border">
                    <thead>
                        <tr class="text-center">
                            <th>Nome</th>
                            <th>Prezzo</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="text-center">
                                <!-- Product Name -->
                                <td>{{ $product->name }}</td>
                                <!-- Product Price -->
                                <td>{{ $product->price }}</td>
                                <!-- Product Tools -->
                                <td>
                                    <!-- Product Show Button -->
                                    <a href="{{ route('admin.products.show', $product) }}" class="btn btn-info mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Product Edit Button -->
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning mx-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Product Delete Button -->
                                    <form class="product-delete-button d-inline-block mx-1" data-product-name="{{ $product->name }}" action="{{ route('admin.products.destroy', $product) }}" method="POST">
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