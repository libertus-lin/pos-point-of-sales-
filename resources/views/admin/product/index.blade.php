@extends('layouts.admin')
@section('content')
    <div class="pagetitle mb-4">
        <h1 class="mb-1">Products Page</h1>
        <nav>
            <ol class="breadcrumb text-dark">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active"><a href="{{ url('create-product') }}" style="text-decoration: underline"><i
                            class='bx bx-plus'></i> Add New Product</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-5">
                        <table class="table datatable table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" class="td-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td class="td-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/product/' . $item->image) }}" class="img-fluid" alt="product image" style="width: 100px"></td>
                                        <td class="td-center">
                                            <a href="{{ url('edit-product/' . $item->id) }}">
                                                <i class='bx bxs-pencil text-warning h5'></i>
                                            </a>
                                            <a href="{{ url('delete-product/' . $item->id) }}">
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
