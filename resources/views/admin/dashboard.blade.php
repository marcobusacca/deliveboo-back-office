@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-3 color">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
                <div class="position-sticky">
                    <div class="list-group list-group-flush mt-4 rounded">
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" aria-current="true" style="background-color: #FF8100">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                            <i class="fas fa-chart-area fa-fw me-3"></i><span>Il tuo ristorante</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                            <i class="fas fa-chart-area fa-fw me-3"></i><span>Il tuo menù</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-2 ripple fw-bold text-white" style="background-color: #FF8100">
                            <i class="fas fa-chart-area fa-fw me-3"></i><span>Statistiche ordini</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-9 p-4">
            <div class="card">
                <div class="card-header">Benvenuto {{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Hai effettuato il login correttamente!') }}

                    <div class="col-12 text-center my-5">
                        <a href="{{ Route('admin.restaurants.index') }}" class="btn btn-primary mx-3">Completa il tuo profilo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
