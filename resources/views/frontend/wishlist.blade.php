@extends('layouts.frontend')
@section('title')
    CodelinStore | Wishlist Saya
@endsection

@section('content')
    <div class="container my-5">
        <div class="row mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </nav>
        </div>

        <span class="h3">Wishlist Saya</span>
        <div class="card my-3 shadow rounded-4 p-4">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product_data mb-4">
                            <div class="col-md-2 border-right">
                                <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                    class="img-fluid rounded-4 bg-white" alt="Product Cart" style="width: 100px">
                            </div>
                            <div class="col-md-5">
                                <span class="fw-semibold">{{ $item->products->name }}</span> <br />
                                <span class="fw-semibold">Rp. {{ $item->products->price }}</span>
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                @if ($item->products->qty > $item->product_qty)
                                    <label for="quantity" class="form-label" id="jumlahProduk">Jumlah Produk</label>
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <button class="input-group-text decrementBtn">-</button>
                                        <input type="text" name="quantity" class="form-control text-center quantityBtn"
                                            value="1" />
                                        <button class="input-group-text incrementBtn">+</button>
                                    </div>
                                @else
                                    <span class="badge text-white" id="stokKosong"> Tidak dapat ditambahkan</span>
                                    <label class="form-label badge bg-danger">Maaf! Stok Tidak Tersedia</label> <br>
                                @endif
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                @if ($item->products->qty > $item->product_qty)
                                    <button class="btn btn-success addToCartBtn btn-sm">
                                        <i class='bx bx-cart'></i> Tambah ke Keranjang
                                    </button>
                                    <button class="btn btn-danger mx-2 btn-sm removeWishlistItem">
                                        <i class='bx bx-trash'></i> Hapus Wishlist
                                    </button>
                                @else
                                    {{-- Button Nonaktif --}}
                                    <button class="btn btn-danger btn-sm removeWishlistItem">
                                        <i class='bx bx-trash'></i> Hapus Wishlist
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <div class="my-5 py-5 m-auto text-center">
                <img src="{{ asset('image.png') }}" class="mb-3"> <br>
                <span style="color: rgb(102, 102, 102)">Wishlist kamu masih kosong!</span> <br>
            </div>
            @endif
        </div>
    </div>
    </div>
@endsection
