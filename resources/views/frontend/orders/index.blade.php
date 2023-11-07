@extends('layouts.frontend')
@section('title')
    CodelinStore | My Orders
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Orderan Saya
                        </div>
                        <div class="card-body">
                            @if ($orders->count() > 0)
                                <table class="table table-light">
                                    <thead>
                                        <th>Tanggal Order</th>
                                        <th>No. Transaksi</th>
                                        <th>Subtotal</th>
                                        <th>Status</th>
                                        <th class="text-center" colspan="2">Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->tracking_number }}</td>
                                                <td>{{ 'Rp. ' . format_uang($item->total_price) }}</td>
                                                <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ url('view-order/' . $item->id) }}"
                                                        class="btn btn-info btn-sm text-white px-3">Details</a>
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->status == '0')
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Payment
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            Transaksi</h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="{{ url('update-payment/' . $item->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12 mb-3">
                                                                                    <input type="hidden"
                                                                                        class="form-control" id="status"
                                                                                        name="status"
                                                                                        value="{{ $item->status }}"
                                                                                        required />
                                                                                </div>
                                                                                <div class="col-md-12 mb-3 text-start">
                                                                                    <label class="form-label">Terima kasih
                                                                                        telah berbelanja, silahkan melakukan
                                                                                        transfer pembayaran ke No. Rekening
                                                                                        berikut:
                                                                                        <ol class="list-unstyled my-2">
                                                                                            <li> <i
                                                                                                    class='bx bx-check bx-tada text-success'></i>
                                                                                                BCA 👉 092034987</li>
                                                                                            <li> <i
                                                                                                    class='bx bx-check bx-tada text-success'></i>
                                                                                                BNI 👉 92183487</li>
                                                                                        </ol>
                                                                                        Setelah selesai melakukan pembayaran
                                                                                        harap upload bukti pembayaran disini
                                                                                        button upload bukti bayar
                                                                                    </label>
                                                                                </div>
                                                                                <div class="col-md-12 mb-3 text-start">
                                                                                    <label for="payment_image"
                                                                                        class="form-label">Upload Bukti
                                                                                        Transfer</label>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="payment_image"
                                                                                        name="payment_image" required />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="modal-footer d-flex justify-content-between">
                                                                            <button type="submit"
                                                                                class="btn btn-primary btn-sm">Bayar</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary btn-sm"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <span class="badge badge-pill bg-success">Sudah Bayar</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="card-body">
                                    <h2 style="color: rgb(118, 118, 118)">Tidak ada produk yang di order</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
