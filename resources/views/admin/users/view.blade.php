@extends('layouts.admin')
@section('content')
    <div class="pagetitle mb-4">
        <h1 class="mb-1">User Detail</h1>
        <nav>
            <ol class="breadcrumb text-dark">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
                <li class="breadcrumb-item">User Details</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Admin Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card">
                            <div class="card-body my-3">
                                <div class="form-group mb-3">
                                    <label class="form-label">Role As</label>
                                    <input type="text" class="form-control"
                                        value="{{ $users->role_as == '0' ? 'User' : 'Admin' }}" disabled readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="{{ $users->name }}" disabled readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $users->email }}" disabled readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" value="{{ $users->phone_number }}" disabled readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" value="{{ $users->address }}" disabled readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Address Details</label>
                                    <input type="text" class="form-control" value="{{ $users->address_details }}" disabled
                                        readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" value="{{ $users->city }}" disabled readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" value="{{ $users->zip_code }}" disabled readonly>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <a href="{{ url('users') }}" class="btn btn-primary btn-sm mx-4">Back</a>
                            </div>
                        </div>
                    </div><!-- End Admin Card -->
                </div>
            </div>
            <!-- End Left side columns -->

        </div>
    </section>
@endsection
