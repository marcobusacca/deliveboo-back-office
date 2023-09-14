@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Edit Title With Object Name -->
            <div class="col-6 d-flex justify-content-start align-items-end mt-5">
                <h1>Modifica... : "{{ $object->name }}"</h1>
            </div>
            <!-- Link To Objects List -->
            <div class="col-6 d-flex justify-content-end align-items-end mt-5">
                <a href="{{ route('admin.objects.index') }}" class="btn btn-primary">Lista...</a>
            </div>
            <!-- Edit Form -->
            <div class="col-12 my-5">
                <form action="{{ route('admin.objects.update', $object) }}" method="POST" class="border p-3 w-100" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Form Group -->
                    <div class="form-group my-4">
                    </div>
                    <!-- Edit Submit Button -->
                    <div class="col-12 d-flex justify-content-center align-items-center my-5">
                        <button class="btn btn-warning fw-bold px-5" type="submit">MODIFICA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection