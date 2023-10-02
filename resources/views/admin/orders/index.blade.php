@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('error'))
                <!-- Operation not Authorized Message -->
                <div class="col-12 p-0 mt-5">
                    <div class="alert alert-danger">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif
            @if (session('message'))
                <!-- Confirm Message -->
                <div class="col-12 p-0 mt-5">
                    <div class="alert alert-success">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Orders Infos Table -->
            <div class="col-12 p-0">
                <table class="table table-striped shadow bg-body-tertiary">
                    <thead>
                        <tr class="text-center">
                            <th>Data</th>
                            <th>Stato</th>
                            <th>Totale</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if ($orders->isEmpty())
                            <tr class="text-center">
                                <td colspan="4" class="py-4">Non è stata effettuata nessun ordinazione</td>
                            </tr>   
                        @else
                            @foreach ($orders as $order)
                                <tr class="text-center">
                                    <!-- Order Date -->
                                    <td>{{ $order->created_at }}</td>
                                    <!-- Order Status -->
                                    <td>{{ $order->order_status }}</td>
                                    <!-- Order Total -->
                                    <td>{{ $order->total }}€</td>
                                    <!-- Order Tools -->
                                    <td>
                                        <!-- Order Show Button -->
                                        <a href="{{ route('admin.orders.show', $order) }}" class="products-tools-btn btn btn-info mx-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Restaurant Edit Button -->
                                        <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-warning mx-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection