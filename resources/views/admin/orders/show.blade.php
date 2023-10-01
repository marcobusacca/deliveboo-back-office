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
                        <!-- Order Total -->
                        <div class="mb-3">
                            <!-- Order Total Icon -->
                            <i class="fa-solid fa-money-bill"></i>
                            <!-- Order Total Text -->
                            <span class="mx-1">{{ $order->total }}€</span>
                        </div>
                        <!-- Order Products -->
                        @foreach ($order->products as $index => $product)
                            <div class="mb-3">
                                <!-- Order Product Icon -->
                                <i class="fa-solid fa-money-bill"></i>
                                <!-- Order Product Text -->
                                <span class="mx-1">{{ $product->name }}</span>
                            </div>
                            <div class="mb-3">
                                <!-- Order Quantity Icon -->
                                <i class="fa-solid fa-money-bill"></i>
                                <!-- Order Quantity Text -->
                                <span class="mx-1">{{ $product }}</span>
                            </div>
                            <div class="mb-3">
                                <!-- Order SubTotal Icon -->
                                <i class="fa-solid fa-money-bill"></i>
                                <!-- Order SubTotal Text -->
                                <span class="mx-1">{{ $product }}€</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection