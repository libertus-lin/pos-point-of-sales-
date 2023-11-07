@extends('layouts.admin')
@section('content')
    <!-- ========== tab components start ========== -->
    <main class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="pagetitle">
            <h1>Epdate Product</h1>
            <nav>
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('products') }}" class="text-black">Products</a></li>
                    <li class="breadcrumb-item active">Update New Product</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body my-4">
                            <form action="{{ url('update-product/' . $product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $product->name }}" required autofocus />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option selected value="{{ $product->id }}">{{ $product->category->name }}
                                            </option>
                                            @foreach ($category as $item)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{ $product->slug }}" required />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="small_description" class="form-label">Small Description</label>
                                        <input type="text" class="form-control" name="small_description"
                                            id="small_description" value="{{ $product->small_description }}" required />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="2" required />{{ $product->description }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" name="price" id="price"
                                            value="{{ $product->price }}" required />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="qty" class="form-label">QTY</label>
                                        <input type="number" class="form-control" name="qty" id="qty"
                                            value="{{ $product->qty }}" required />
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status"
                                                    {{ $product->status == '1' ? 'checked' : '' }} name="status">
                                                <label class="form-check-label" for="status">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="trending"
                                                    {{ $product->trending == '1' ? 'checked' : '' }} name="trending">
                                                <label class="form-check-label" for="trending">
                                                    Trending
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($product->image)
                                        <img src="{{ asset('assets/uploads/product/' . $product->image) }}"
                                            class="img-fluid w-50" alt="Product Image">
                                    @endif
                                    <div class="col-md-12 mb-3">
                                        <label for="image" class="form-label">Upload image</label>
                                        <input type="file" class="form-control" id="image" name="image" />
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
