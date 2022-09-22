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
                    <h1 class="">Job Application</h1>
                </div>
                <div class="card">
                    {{-- <a href="/dashboard/apply/cetak" target="_blank" class="btn btn-success mb-3"><i
                            class="bi bi-bookmark-plus"></i> Cetak</a> --}}
                    <table class="table table-bordered border-dark">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gander</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Education</th>
                                {{-- <th scope="col">Cv</th> --}}
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apply as $apply)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>{{ $apply->title }}</td>
                                    <td>{{ $apply->name }}</td>
                                    <td>{{ $apply->gander }}</td>
                                    <td>{{ $apply->email }}</td>
                                    <td>{{ $apply->phone }}</td>
                                    <td>{{ $apply->education }}</td>
                                    {{-- <td>{{ $apply->cv }}</td> --}}
                                    <td>
                                        @if ($apply->image)
                                            <img src="{{ asset('storage/' . $apply->image) }}" class="img-fluid"
                                                alt="{{ $apply->name }}" style=" max-width: 20%; max-height: 20%;">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/dashboard/apply/{{ $apply->id }}" class="btn btn-success btn-small">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="/dashboard/apply/{{ $apply->id }}" method="post"
                                            class="d-inline">
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

                    {{-- <nav aria-label="#">
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <a class="page-link m-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link m-1" href="#">1</a></li>
                          <li class="page-item" aria-current="page">
                            <a class="page-link m-1" href="#">2</a>
                          </li>
                          <li class="page-item"><a class="page-link m-1" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link m-1" href="#">Next</a>
                          </li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
@endsection
