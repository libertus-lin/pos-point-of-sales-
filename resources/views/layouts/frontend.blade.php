<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('logo-codelinstore.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Satisfy&display=swap"
        rel="stylesheet">

    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.inc.frontendNavbar')

    <!-- ======= Main ======= -->
    <div class="content">

        <!--========== Content ===============-->
        @yield('content')
        <!--========== End Content ===============-->


        <div class="footer-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#a2d9ff" fill-opacity="0.31"
                    d="M0,288L40,277.3C80,267,160,245,240,218.7C320,192,400,160,480,128C560,96,640,64,720,90.7C800,117,880,203,960,213.3C1040,224,1120,160,1200,149.3C1280,139,1360,181,1400,202.7L1440,224L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>
    <!-- ======= End Main ======= -->

    <!-- ======= Footer ======= -->
    <footer class="footer" style="background: #e2f3ff">
        <div class="container">
            <div class="row m-auto py-5 mx-3">
                <div class="col-md-4 mb-3">
                    <p class="fw-bold h4 mb-2">Newsletter</p>
                    <span class="fw-semibold">Get notified when we publish something new! Unsubscribe anytime.</span>
                    <form action="" class="form mt-2">
                        <div class="form-group d-flex flex-column">
                            <input type="email" class="form-control mb-1" placeholder="Your email">
                            <button class="py-2 rounded-2 text-white btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 mb-3">
                    <p class="fw-bold h4 mb-2">Contact Us</p>
                    <span class="fw-semibold">Please leave your message via email below.!</span> <br />
                    <span class="fw-semibold"><a href="#"
                            class="text-decoration-underline">codelinstore@gmail.com</a></span>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 mb-3">
                    <p class="fw-bold h4 mb-2">Follow us on social media at:</p>
                    <i class='bx bxl-facebook-square bx-tada bx-rotate-90 bx-md text-primary'></i>
                    <i class='bx bxl-youtube bx-tada bx-rotate-90 bx-md text-danger'></i>
                    <i class='bx bxl-instagram-alt bx-tada bx-rotate-90 bx-md text-danger-emphasis'></i>
                </div>
            </div>
        </div>
        <div class="row text-center py-5" style="background: #F3F4F5">
            <div class="col-md-12">
                <span class="fw-semibold">Copyright &copy; 2023 by Libertus All right serve</span>
            </div>
        </div>
    </footer>
    <!-- ======= End Footer ======= -->

    <!-- ========== script admin ========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- SweetAlert -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/data.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('success'))
        <script>
            swal("{{ session('success') }}")
        </script>
    @endif
    @yield('scripts')
</body>

</html>
