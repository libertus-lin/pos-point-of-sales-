@extends('layouts.frontend')
@section('title')
    CodelinStore | Checkout
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <span class="fw-semibold h4">Checkout Produk</span>
            <form action="{{ url('place-order') }}" method="post">
                {{ csrf_field() }}
                <div class="row mt-3">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="my-4">Lengkapi Data Diri Anda:</h5>
                                <div class="row">
                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="name" class="form-label">Nama lengkap</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ Auth::user()->name }}" required>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ Auth::user()->email }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="phone_number" class="form-label">Nomor Telepon/Wa</label>
                                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                                value="{{ Auth::user()->phone_number }}" required>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="address" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ Auth::user()->address }}" required>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="address_details" class="form-label">Detail Alamat</label>
                                            <textarea class="form-control" id="address_details" name="address_details" rows="3">{{ Auth::user()->address_details }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col">
                                            <label for="city" class="form-label">Kota</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ Auth::user()->city }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="zip_code" class="form-label">Kode Pos</label>
                                            <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                value="{{ Auth::user()->zip_code }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h5>Orderan Anda</h5>
                                <hr />
                                <table class="table table-striped">
                                    <thead>
                                        <th>Nama Produk</th>
                                        <th class="text-center">Qty</th>
                                        <th>Harga</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td class="text-center">{{ $item->product_qty }}</td>
                                                <td>Rp. {{ $item->products->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary btn-sm w-100">Pesanan Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
