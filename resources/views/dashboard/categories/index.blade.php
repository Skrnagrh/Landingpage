@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav" class="m-3">
        <div id="layoutSidenav_content">

            @if (session()->has('success'))
                <div class="alert alert-success col-lg-12" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive col-md-12">
                <a href="/dashboard/categories/create" class="btn btn-success mb-3"><i class="bi bi-bookmark-plus"></i> Create
                    New category</a>
                <div class="card">
                    <table class="table table-bordered border-dark">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning">
                                            <i class="bi bi-pen text-light"></i>
                                        </a>
                                        <form action="/dashboard/categories/{{ $category->slug }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0"
                                                onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
@endsection
