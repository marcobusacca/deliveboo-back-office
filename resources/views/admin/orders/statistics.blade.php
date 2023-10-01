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
            <!-- Card Restaurant Order Statistics -->
            <div class="col-12 d-flex justify-content-center align-items-center my-3">
            </div>
        </div>
    </div>
@endsection