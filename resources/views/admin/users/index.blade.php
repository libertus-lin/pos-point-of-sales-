@extends('layouts.admin')
@section('content')
    <div class="pagetitle mb-4">
        <h1 class="mb-1">Users Page</h1>
        <nav>
            <ol class="breadcrumb text-dark">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                <li class="breadcrumb-item">Users</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-5">
                        <table class="table datatable table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col" class="td-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td class="td-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td class="td-center">
                                            <a href="{{ url('view-user/' . $item->id) }}" class="btn btn-warning btn-sm text-white">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
