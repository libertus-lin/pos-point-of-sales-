@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('orders') }}">Orders</a></li>
                <li class="breadcrumb-item active">User Order</li>
            </ol>
        </nav>
    </div>

    <div class="section dashboard">
        <div class="row mb-2">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Orders View
                        <a href="{{ url('orders') }}" class="btn btn-info btn-sm">Back</a>
                    </div>
                    <div class="card-body py-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="form-label">Name</label>
                                    <label class="form-control">{{ $orders->name }}</label>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <label class="form-control">{{ $orders->email }}</label>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <label class="form-control">{{ $orders->phone_number }}</label>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Address</label>
                                    <label class="form-control">
                                        {{ $orders->address_details }} <br>
                                        {{ $orders->city }}
                                    </label>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Zip Code</label>
                                    <div class="border p-2 rounded-2">{{ $orders->zip_code }}</div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select id="status" name="status" class="form-select">
                                            <option selected>Choose Status</option>
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                        </select>

                                        <button type="submit" class="btn btn-primary btn-sm mt-4">Update Status</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-light">
                                    <thead>
                                        <th>Nama Produk</th>
                                        <th>QTY</th>
                                        <th>Harga</th>
                                        <th>Produk</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ 'Rp. ' . format_uang($item->price) }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                                        alt="Product Image" style="width: 100px">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="card">
                                    <div class="card-header">
                                        <h3>Silahkan update pembayaran </h3>
                                    </div>

                                    @if ($orders->status > 0 && (!@empty($item->payment_image == null)))
                                        <span>Bukti Transfer Masih Kosong</span>
                                    @else
                                    <div class="card-body">
                                        <img src="{{ asset('assets/uploads/payment/' . $orders->payment_image) }}"
                                            alt="Payment Image" style="width: 100px">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="float-end">Grand total: <span
                                class="text-black fw-semibold">{{ $orders->total_price }}</span></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
