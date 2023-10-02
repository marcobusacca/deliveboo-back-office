@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
            <div class="col-12 d-flex justify-content-center align-items-center bg-white my-5">
                <canvas id="orderChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('orderChart').getContext('2d');
        var orderChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Numero di Ordini',
                    data: {!! json_encode($orderCounts) !!},
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            // Mostra solo numeri interi
                            if (Math.floor(value) === value) {
                                return value;
                            }
                        }
                    }
                }
            }
            }
        });
    </script>
@endsection