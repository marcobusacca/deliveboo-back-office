@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Index Title -->
            <div class="col-6 d-flex justify-content-start align-items-end my-5">
                <h1>...</h1>
            </div>
            <!-- Link To Dashboard -->
            <div class="col-6 d-flex justify-content-end align-items-end my-5">
                <a href="{{ Route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
            </div>
            <!-- Delete Confirm Message -->
            @if (session('message'))
                <div class="col-12 mt-5">
                    <div class="alert alert-success">
                        <span>{{ session('message') }}</span>
                    </div>
                </div>
            @endif
            <!-- Objects Infos Table -->
            <div class="col-12">
                <table class="table table-striped border">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($objects as $object)
                            <tr class="text-center">
                                <!-- Object Id -->
                                <td>{{ $object->id }}</td>
                                <!-- Object Name -->
                                <td>{{ $object->name }}</td>
                                <td>
                                    <!-- Object Show Button -->
                                    <a href="{{ route('admin.objects.show', $object) }}" class="btn btn-info mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <!-- Object Edit Button -->
                                    <a href="{{ route('admin.objects.edit', $object) }}" class="btn btn-warning mx-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Object Delete Button -->
                                    <form class="object-delete-button d-inline-block mx-1" data-object-name="{{ $object->name }}" action="{{ route('admin.objects.destroy', $object) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Object Create Button -->
                        <tr class="text-center">
                            <td colspan="4" class="py-4">
                                <a href="{{ route('admin.objects.create') }}" class="text-decoration-none">Crea ...</a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('admin.partials.modal_object_delete'); --}}
@endsection