@extends('layouts.admin')
@section('content')
<div class="pagetitle mb-4">
    <h1 class="mb-1">Categories Page</h1>
    <nav>
        <ol class="breadcrumb text-dark">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
            <li class="breadcrumb-item">Categories</li>
            <li class="breadcrumb-item active"><a href="{{ url('create-category') }}" style="text-decoration: underline"><i class='bx bx-plus'></i> Add New Category</a></li>
        </ol>
    </nav>
</div>

<!--=========== TableData ===============-->
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <table class="table datatable table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col" class="td-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="img-fluid" alt="product image" style="width: 100px">
                                    </td>
                                    <td class="td-center">
                                        <a href="{{ url('edit-category/'.$item->id) }}">
                                            <i class='bx bxs-pencil text-warning h5'></i>
                                        </a>
                                        <a href="{{ url('delete-category/'.$item->id) }}">
                                            <i class='bx bx-trash-alt text-danger h5'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
