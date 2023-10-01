@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <!-- Redirect To Orders List -->
            <div class="col-12 redirect-back-btn">
                <a href="{{ route('admin.orders.index') }}" class="bg-black btn btn-dark rounded-5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Torna alla lista degli ordini</span>
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
            <!-- Card Restaurant Order -->
            <div class="col-12 d-flex justify-content-center align-items-center my-3">
                <div class="card shadow bg-body-tertiary" style="width: 35rem">
                    <!-- Order Details -->
                    <div class="card-body">
                        <!-- Order Name and Surname -->
                        <h3 class="mb-3">{{ $order->name }} {{ $order->surname }}</h3>
                         <!-- Order Address -->
                        <div class="mb-3">
                            <!-- Order Address Icon -->
                            <i class="fa-solid fa-map-pin"></i>
                             <!-- Order Address Text -->
                            <span class="mx-1">{{ $order->address }}</span>
                        </div>
                        <!-- Order Phone Number -->
                        <div class="mb-3">
                            <!-- Order Phone Number Icon -->
                            <i class="fa-solid fa-phone"></i>
                            <!-- Order Phone Number Text -->
                            <span class="mx-1">+39 {{ $order->phone_number }}</span>
                        </div>
                        <!-- Order Email -->
                        <div class="mb-3">
                            <!-- Order Email Icon -->
                            <i class="fa-solid fa-envelope"></i>
                            <!-- Order Email Text -->
                            <span class="mx-1">{{ $order->email }}</span>
                        </div>
                        @if ($order->notes)
                            <!-- Order Notes -->
                            <div class="mb-3">
                                <!-- Order Notes Icon -->
                                <i class="fa-solid fa-circle-info"></i>
                                <!-- Order Notes Text -->
                                <span class="mx-1">{{ $order->notes }}</span>
                            </div>
                        @endif
                         <!-- Order Status -->
                         <div class="mb-3">
                            <!-- Order Status Icon -->
                            <i class="fa-solid fa-circle-info"></i>
                            <!-- Order Status Text -->
                            <span class="mx-1">{{ $order->order_status }}</span>
                        </div>
                        @if (count($order->products) != 0)
                            <!-- Order Product/s -->
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="my-3">Riepilogo Ordine</h4>
                                    </div>
                                    <!-- Product/s Details -->
                                    @foreach ($order->products as $product)
                                        <div class="col-12 d-flex justify-content-between px-4 my-2">
                                            <!-- Product Name and Quantity -->
                                            <span class="mx-1">• {{ $product->pivot->quantity }} x {{ $product->name }}</span>
                                            <!-- Product SubTotal -->
                                            <span class="mx-1 fw-bold">{{ $product->pivot->sub_total }}€</span>
                                        </div>
                                    @endforeach
                                    <!-- Order Total -->
                                    <div class="col-12 text-center my-3">
                                        <!-- Order Total Text -->
                                        <h5 class="d-inline-block fs-5 my-3">Incasso totale:</h5>
                                        <span class="fw-bold fs-5 mx-1">{{ $order->total }}€</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection