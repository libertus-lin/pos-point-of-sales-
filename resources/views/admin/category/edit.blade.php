@extends('layouts.admin')
@section('content')
    <!-- ========== tab components start ========== -->
    <main class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="pagetitle">
            <h1>Epdate Category</h1>
            <nav>
                <ol class="breadcrumb text-dark">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}" class="text-black">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('categories') }}" class="text-black">Categories</a></li>
                    <li class="breadcrumb-item active">Update New Category</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body my-4">
                            <form action="{{ url('update-category/' . $category->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $category->name }}" required autofocus />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{ $category->slug }}" required />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="2" required />{{ $category->description }}</textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status"
                                                    {{ $category->status == '1' ? 'checked' : '' }} name="status">
                                                <label class="form-check-label" for="status">
                                                    Status
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="popular"
                                                    {{ $category->popular == '1' ? 'checked' : '' }} name="popular">
                                                <label class="form-check-label" for="popular">
                                                    Popular
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($category->image)
                                        <img src="{{ asset('assets/uploads/category/' . $category->image) }}"
                                            class="img-fluid w-50" alt="Category Image">
                                    @endif
                                    <div class="col-md-12 mb-3">
                                        <label for="image" class="form-label">Upload image</label>
                                        <input type="file" class="form-control" id="image" name="image" />
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url('categories') }}" class="btn btn-info text-white">Cancel</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <!-- ========== tab components end ========== -->
@endsection
