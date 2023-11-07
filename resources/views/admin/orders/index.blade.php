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
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </nav>
    </div>

    <div class="section dashboard">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mx-2">All Orders</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-light">
                            <thead>
                                <th>Tanggal Order</th>
                                <th>No. Transaksi</th>
                                <th>Subtotal</th>
                                <th>Status</th>
                                <th>Status Pembayaran</th>
                                <th class="text-center">Action</th>
                            </thead>

                            {{-- PAYMENT LOGIC --}}
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_number }}</td>
                                        <td>{{ 'Rp. ' . format_uang($item->total_price) }}</td>
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                        <td>
                                            {{-- sudahTransfer & statusnyaCompleted --}}
                                            @if ($item->payment_image == !null && $item->status == '1')
                                                <span class="badge badge-pill bg-success">Sudah Bayar</span>

                                                {{-- sudahTransfer tapi statusnyaPending --}}
                                            @elseif ($item->payment_image == !null && $item->status == '0')
                                                <span class="badge badge-pill bg-info">Sudah Bayar</span>
                                                <small>- Tapi pending</small>
                                            @else
                                                {{-- belumTransfer dan statusnyaPending --}}
                                                <span class="badge badge-pill bg-danger">Belum Bayar</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/view-order/' . $item->id) }}"
                                                class="btn btn-primary btn-sm text-white px-3">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- ./ PAYMENT LOGIC --}}
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('order-history') }}" class="btn btn-primary btn-sm mx-2">History</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
