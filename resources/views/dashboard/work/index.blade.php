@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav" class="m-3">
        <div id="layoutSidenav_content">

            <div class="table-responsive col-md-12 mr-3">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap  align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1><strong>W</strong>ork </h1>
                </div> 

                <a href="/dashboard/work/create" class="btn btn-success mb-3"><i class="bi bi-bookmark-plus"></i> Create New work</a>
                <div class="card">
                <table class="table table-striped table-sm">
                    <thead class="table-success p-3">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Placement</th>
                            <th scope="col">Dedline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($work as $work)
                            <tr>
                                <td><strong>{{ $loop->iteration }}</strong></td>
                                <td>{{ $work->title }}</td>
                                <td>{{ $work->placement }}</td>
                                <td>{{ $work->deadline }}</td>
                                <td>
                                    <a href="/dashboard/work/{{ $work->slug }}" class="btn btn-success btn-small">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="/dashboard/work/{{ $work->slug }}/edit" class="btn btn-warning">
                                        <i class="bi bi-pen text-light"></i>
                                    </a>
                                    <form action="/dashboard/work/{{ $work->slug }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
