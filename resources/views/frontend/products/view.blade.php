@extends('layouts.frontend')
@section('title', $products->name)

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('category') }}">Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $products->category->name }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="card shadow product_data rounded-4 p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('assets/uploads/product/' . $products->image) }}" class="img-fluid w-100"
                                alt="{{ $products->name }}">
                        </div>
                        <div class="col-md-8">
                            <h2 class="mb-0">
                                {{ $products->name }}
                                @if ($products->trending == '1')
                                    <span style="font-size: 12px"
                                        class="float-end form-label badge bg-primary">Trending</span>
                                @endif
                            </h2>

                            <hr>
                            <span class="fw-semibold">Price: Rp. {{ $products->price }}</span>
                            <p class="mt-3">
                                {!! $products->description !!}
                            </p>

                            @if ($products->qty > 0)
                                <label class="form-label badge bg-success">In stock</label>
                            @else
                                <label class="form-label badge bg-danger">Out of stock</label>
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                        @if ($products->qty > 0)
                                            <button class="input-group-text decrementBtn">-</button>
                                            <input type="text" name="quantity"
                                                class="form-control text-center quantityBtn" value="1" />
                                            <button class="input-group-text incrementBtn">+</button>
                                        @else
                                            <input type="text" name="quantity"
                                                class="form-control text-center quantityBtn" value="0" disabled />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label for="quantity" class="form-label text-white"><s>Quantity</s></label>
                                    <div class="form-group">
                                        @if ($products->qty > 0)
                                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"><i
                                                    class='bx bx-cart-add'></i> Tambah ke Bag</button>
                                        @endif
                                        <button type="button" class="btn btn-success me-3 addToWishlist float-start"><i
                                                class='bx bx-heart'></i> Add to Wishlist</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
