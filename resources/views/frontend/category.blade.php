@extends('layouts.frontend')
@section('title')
    Categories
@endsection

@section('content')

    <div class="section-products">
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="fw-bold h4">All Categories</span>
                        <div class="row mt-3">
                            @foreach ($category as $cate)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ url('view-category/' . $cate->slug) }}">
                                        <div class="card border-0 rotateProduct">
                                            <img src="{{ asset('assets/uploads/category/' . $cate->image) }}"
                                                class="img-fluid rounded-4" alt="Category Image">
                                            <div class="card-body text-center">
                                                <span class="fw-bold">{{ $cate->name }}</span> <br />
                                                <span>
                                                    {{ $cate->description }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
