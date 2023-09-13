@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Create Title -->
            <div class="col-6 d-flex justify-content-start align-items-end mt-5">
                <h1>Crea...</h1>
            </div>
            <!-- Link To Objects List -->
            <div class="col-6 d-flex justify-content-end align-items-end mt-5">
                <a href="{{ route('admin.objects.index') }}" class="btn btn-primary">Lista...</a>
            </div>
            <!-- Create Form -->
            <div class="col-12 my-5">
                <form action="{{ route('admin.objects.store') }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                    @csrf
                    <!-- Form Group -->
                    <div class="form-group my-4">
                    </div>
                    <!-- Create Submit Button -->
                    <div class="col-12 d-flex justify-content-center align-items-center my-5">
                        <button class="btn btn-success fw-bold px-5" type="submit">CREA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection