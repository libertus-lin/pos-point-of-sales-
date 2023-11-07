@extends('layouts.admin')
@section('content')
    <main class="container-fluid">
        <div class="pagetitle">
            <h1>Add Product</h1>
            <nav>
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('products') }}" class="text-black">Products</a></li>
                    <li class="breadcrumb-item active">Add New Product</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body my-4">
                            <form action="{{ url('insert-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required autofocus />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option disabled selected value="">Select Category</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug" required />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="small_description" class="form-label">Small Description</label>
                                        <input type="text" class="form-control" name="small_description" id="small_description" required />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="2" required /></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="qty" class="form-label">QTY</label>
                                        <input type="number" class="form-control" name="qty" id="qty" required />
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status" name="status">
                                                <label class="form-check-label" for="status">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="trending" name="trending">
                                                <label class="form-check-label" for="trending">
                                                    Trending
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="image" class="form-label">Upload image</label>
                                        <input type="file" class="form-control" id="image" name="image" required />
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url('products') }}" class="btn btn-info text-white">Cancel</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <!-- ========== tab components end ========== -->
@endsection
