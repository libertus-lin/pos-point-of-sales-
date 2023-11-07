@extends('layouts.admin')
@section('content')
    <div class="pagetitle mb-4">
        <h1 class="mb-1">About Me</h1>
        <nav>
            <ol class="breadcrumb text-dark">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                <li class="breadcrumb-item">About</li>
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
                        <div class="card rounded-4">
                            <div class="card-body mt-5">
                                <table>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold">Role As</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">{{ Auth::user()->role_as == '0' ? 'User' : 'Admin' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold"> Full Name</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold"> E-Mail</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold"> Address</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">{{ Auth::user()->address_details }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold"> City</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">{{ Auth::user()->city }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold"> Zip Code</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">{{ Auth::user()->zip_code }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-body">
                                <hr>
                                <table>
                                    <tr>
                                        <td style="color: #012970; font-weight: bold"><i class='bx bxl-github'></i> Github</td>
                                        <td>:</td>
                                        <td style="color: #012970; font-weight: bold">
                                            <a href="https://www.github.com/libertus-lin/" target="_blank" class="text-black">
                                                Libertus
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div><!-- End Admin Card -->
                </div>
            </div>
            <!-- End Left side columns -->

        </div>
    </section>
@endsection
