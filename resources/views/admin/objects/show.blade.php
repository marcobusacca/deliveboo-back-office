@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Object Name -->
            <div class="col-6 d-flex justify-content-start align-items-end my-5">
                <h1>{{ $object->name }}</h1>
            </div>
            <!-- Link To Object List -->
            <div class="col-6 d-flex justify-content-end align-items-end my-5">
                <a href="{{ Route('admin.objects.index') }}" class="btn btn-primary">Lista...</a>
            </div>
            <!-- Create, Edit Confirm Message -->
            @if (session('message'))
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-12 mb-5">
                <!-- Show Card -->
                <div class="card w-100">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection