@extends('layouts.frontend')
@section('title')
    CodelinStore | Keranjang Saya
@endsection

@section('content')
    <div class="my-5">
        <div class="container">
            <div class="row mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    </ol>
                </nav>
            </div>


            <span class="h3">Keranjang Belanja</span>
            <div class="card shadow rounded-4 my-3">
                @if ($cartItems->count() > 0)
                    <div class="card-body">
                        @php $total = 0; @endphp
                        @foreach ($cartItems as $item)
                            <div class="row product_data mb-2">
                                <div class="col-md-2 border-right">
                                    <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                        class="img-fluid rounded-4 bg-white" alt="Product Cart" style="width: 100px">
                                </div>
                                <div class="col-md-5">
                                    <span class="fw-semibold">{{ $item->products->name }}</span> <br />
                                    <span class="fw-semibold">Rp. {{ $item->products->price }}</span>
                                </div>
                                <div class="col-md-3">
                                    <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                    @if ($item->products->qty >= $item->product_qty)
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <div class="input-group text-center mb-3" style="width: 130px">
                                            <button class="input-group-text changeQtyBtn decrementBtn">-</button>
                                            <input type="text" name="quantity"
                                                class="form-control text-center quantityBtn"
                                                value="{{ $item->product_qty }}" />
                                            <button class="input-group-text changeQtyBtn incrementBtn">+</button>
                                        </div>
                                        @php $total += $item->products->price * $item->product_qty; @endphp
                                    @else
                                        <label class="form-label badge bg-danger">Out of stock</label>
                                    @endif
                                </div>
                                <div class="col-md-2 d-flex align-items-center">
                                    <button class="btn btn-danger btn-sm deleteCartBtn">
                                        <i class='bx bx-trash'></i> Hapus Item
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2">
                                <span>Subtotal: Rp. {{ $total }}</span>
                            </div>
                            <div class="col-md-5">
                                <a href="{{ url('checkout') }}" class="btn btn-success btn-sm">Checkout</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        <div class="my-5 py-4 m-auto">
                            <img src="{{ asset('image.png') }}" class="mb-3"> <br>
                            <span style="color: rgb(102, 102, 102)">Wah... Keranjang belanja kamu masih kosong, yuk belanja
                                lagi...!</span> <br>
                        </div>

                        <a href="{{ url('category') }}" class="btn btn-primary btn-sm my-4">
                            Yuk Shopping Lagi!!!
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
