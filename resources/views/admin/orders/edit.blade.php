@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Redirect To Orders List -->
            <div class="col-12 redirect-back-btn">
                <a href="{{ route('admin.orders.index') }}" class="bg-black btn btn-dark rounded-5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Torna alla lista degli ordini</span>
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
            <!-- Restaurant Order Form -->
            <div class="col-12 my-3">
                <form action="{{ route('admin.orders.update', $order) }}" method="POST" enctype="multipart/form-data" class="card shadow bg-body-tertiary p-2">
                    @csrf
                    @method('PUT')
                    <!-- Card Header -->
                    <div class="card-header bg-white py-3">
                        <!-- Edit Title -->
                        <h1 class="text-center">Modifica Stato dell'Ordine</h1>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Order Status Form Group -->
                        <div class="form-group my-4">
                            <!-- Status Label -->
                            <label class="control-label my-2">Nome ristorante *</label>
                            <!-- Status Select -->
                            <select name="order_status" id="order_status" placeholder="Modifica lo stato dell'ordine" class="form-control @error('order_status') is-invalid @enderror" value="{{ old('order_status') ?? $order->order_status }}" required>
                                <option value="">Modifica lo stato dell'ordine</option>
                                <option @selected(old('order_status', $order->order_status) == "In preparazione") value="In preparazione">In preparazione</option>
                                <option @selected(old('order_status', $order->order_status) == "In consegna") value="In consegna">In consegna</option>
                                <option @selected(old('order_status', $order->order_status) == "Consegnato") value="Consegnato">Consegnato</option>
                            </select>
                            <!-- Name Error Text -->
                            @error('order_status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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