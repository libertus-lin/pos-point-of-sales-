@extends('layouts.admin')

@section('title')
    Order History
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Order History</li>
            </ol>
        </nav>
    </div>

    <div class="section dashboard">
        <div class="row mb-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="mx-2">Order History</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-light">
                            <thead>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Subtotal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_number }}</td>
                                        <td>Rp. {{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/' . $item->id) }}"
                                                class="btn btn-warning btn-sm text-white px-3">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('orders') }}" class="btn btn-primary btn-sm mx-2">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
