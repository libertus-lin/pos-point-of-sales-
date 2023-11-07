@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a class="logo d-flex align-items-center w-auto">
              <img src="{{ asset('favicon.png') }}" alt="logo">
              <span class="d-none d-lg-block">Codelin<b class="text-primary">Store</b></span>
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3 rounded-4">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Daftar Disini</h5>
                <p class="text-center small">Masukkan data lengkap anda!</p>
              </div>

              <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('register') }}">
                @csrf

                <div class="col-12">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password" required autocomplete="new-password">
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                    <label class="form-check-label" for="acceptTerms">Mencetang setuju, artinya menyetujui <a href="#">Syarat & Ketentuan</a> kami.</label>
                  </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Daftar') }}
                    </button>
                </div>
                <div class="col-12">
                    <label for="form-label">Sudah daftar? <a href="{{ url('login') }}"> Masuk</a></label>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
@endsection
