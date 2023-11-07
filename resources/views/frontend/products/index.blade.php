@extends('layouts.frontend')
@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Koleksi Produk</a></li>
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row mt-3">
                <span class="fw-semibold h4">{{ $category->name }}</span>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <a href="{{ url('view-category/' . $category->slug . '/' . $prod->slug) }}">
                            <div class="card border-0 rotateProduct">
                                <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" class="img-fluid rounded-4"
                                    alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span>Rp. {{ $prod->price }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
