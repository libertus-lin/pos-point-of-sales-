@extends('layouts.frontend')
@section('title')
    CodelinStore | Orders View
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-light">
                                <thead>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Produk</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-center">{{ 'Rp. ' . format_uang($item->price) }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}"
                                                    alt="Product Image" style="width: 100px">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <span class="text-black fw-semibold float-end h4">Subtotal:
                                    {{ ' Rp. ' . format_uang($orders->total_price) }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
