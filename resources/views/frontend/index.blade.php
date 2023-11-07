@extends('layouts.frontend')
@section('title')
    CodelinStore | Belanja Aman & Terpacaya
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-2 d-flex align-items-center">
                <img src="{{ asset('assets/img/smart-watch__3_-removebg-preview.png') }}" class="img-fluid rounded-4"
                alt="Product Image" width="100%">
            </div>
            <div class="col-md-8">
                <!-- Slides with controls -->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-3">
                        <div class="carousel-item active rounded-3">
                            <img src="{{ asset('frontend/img/carousell (1).png') }}" class="d-block w-100 rounded-3">
                        </div>
                        <div class="carousel-item rounded-3">
                            <img src="{{ asset('frontend/img/carousell (2).png') }}" class="d-block w-100 rounded-3">
                        </div>
                        <div class="carousel-item rounded-3">
                            <img src="{{ asset('frontend/img/carousell (3).png') }}" class="d-block w-100 rounded-3">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- End Slides with controls -->
            </div>
            <div class="col-md-2 d-flex align-items-center">
                <img src="{{ asset('assets/img/macbook-removebg-preview.png') }}" class="img-fluid rounded-4"
                alt="Product Image" width="100%">
            </div>
        </div>
    </div>

    <div class="py-5 my-5">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <img src="{{ asset('assets/img/macbook__5_-removebg-preview.png') }}" alt="">
                </div>
                <div class="col-md-6">
                    <h3 class="fw-semibold mb-4">MacBook Air</h3>
                    <p style="font-size: 20px" class="fw-semibold mb-3">Kekuatan besar dalam wujud ringan.</p>

                    <p style="font-size: 17px" class="fw-semibold mb-3">MacBook Air dengan M1 adalah laptop portabel yang mengagumkan — laptop ini gesit dan cepat dengan desain senyap, tanpa kipas, dan layar Retina yang indah. Berkat bentuk yang ramping dan kekuatan baterai sepanjang hari, MacBook Air ini bekerja dengan sangat cepat dan ringan.</p>

                    <p style="font-size: 17px" class="fw-semibold">M1 adalah chip pertama yang dirancang khusus untuk Mac. Apple silicon mengintegrasikan CPU, GPU, Neural Engine, I/O, dan masih banyak lagi dalam sebuah chip mungil. Dilengkapi 16 miliar transistor yang menakjubkan, M1 menghadirkan performa luar biasa, teknologi khusus, dan efisiensi daya yang luar biasa — terobosan besar untuk Mac.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5">
        <div class="container">
            <span class="fw-semibold h4">Featured Products</span>
            <div class="row mt-3">
                <div class="owl-carousel product-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div class="card border-0 rotateProduct">
                                <img src="{{ asset('assets/uploads/product/' . $prod->image) }}" class="img-fluid rounded-4"
                                    alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $prod->name }}</h5>
                                    <span>Rp. {{ $prod->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <span class="fw-semibold h4">Trending Categories</span>
            <div class="row mt-3">
                <div class="owl-carousel product-carousel owl-theme">
                    @foreach ($trending_category as $tCategory)
                        <div class="item">
                            <a href="{{ url('view-category/' . $tCategory->slug) }}">
                                <div class="card border-0 rotateProduct">
                                    <img src="{{ asset('assets/uploads/category/' . $tCategory->image) }}"
                                        class="img-fluid rounded-4" alt="Category Image">
                                    <div class="card-body">
                                        <h5>{{ $tCategory->name }}</h5>
                                        <span>{{ $tCategory->description }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

     <!--====== Features Part Start ======-->

    <!--====== Features Part Ends ======-->

@endsection

@section('scripts')
    <script>
        $('.product-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
