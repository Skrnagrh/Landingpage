@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav" class="m-3">
        <div id="layoutSidenav_content">

            <div class="table-responsive col-lg-12 mr-3">

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap  align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1><strong>N</strong>ews</h1>
                </div>
                <a href="/dashboard/news/create" class="btn btn-success mb-3"><i class="bi bi-bookmark-plus"></i> Create New
                    News</a>
                <div class="card">
                    <table class="table table-bordered border-dark">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $news)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>{{ $news->title }}</td>
                                    <td>{{ $news->category->name }}</td>
                                    <td>{{ $news->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="/dashboard/news/{{ $news->slug }}" class="btn btn-success btn-small">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="/dashboard/news/{{ $news->slug }}/edit" class="btn btn-warning">
                                            <i class="bi bi-pen text-light"></i>
                                        </a>
                                        <form action="/dashboard/news/{{ $news->slug }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0"
                                                onclick="return confirm('Are you sure?')"><i
                                                    class="bi bi-trash"></i></button>
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
