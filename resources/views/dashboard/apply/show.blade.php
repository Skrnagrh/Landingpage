@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav" class="m-3">
        <div id="layoutSidenav_content">
            <div class="card m-3">
                <div class="row row-cols-2 p-3">
                    <div class="col-md-8">
                        <h1><strong>{{ $apply->name }}</strong></h1>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <p><strong>
                                        <td>Job Title </td>
                                    </strong>
                                    <td>{!! $apply->title !!}</td>
                                </p>
                                <p><strong>
                                        <td>Id Card</td>
                                        <td>:</td>
                                    </strong>{{ $apply->idcard }}</p>
                                <p><strong>
                                        <td>Date Brithday</td>
                                        <td>:</td>
                                    </strong>
                                    <td>{{ $apply->date }}</td>
                                </p>
                                <p><strong>
                                        <td>Gander</td>
                                        <td>:</td>
                                    </strong>
                                    <td>{{ $apply->gander }}</td>
                                </p>
                                <p><strong>
                                        <td>Address</td>
                                        <td>:</td>
                                    </strong>
                                    <td>{{ $apply->address }}, {{ $apply->city }}</td>
                                </p>
                                <p><strong>
                                        <td>Email</td>
                                        <td>:</td>
                                    </strong>
                                    <td>{{ $apply->email }}</td>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p><strong>
                                        <td>Phone</td>
                                        <td>:</td>
                                    </strong>
                                    <td>{{ $apply->phone }}</td>
                                </p>
                                <p><strong>
                                        <td>Education</td>
                                        <td>: </td>
                                    </strong>
                                    <td>{{ $apply->education }}</td>
                                </p>
                                <p><strong>
                                        <td>School</td>
                                        <td>: </td>
                                    </strong>
                                    <td>{{ $apply->school }}</td>
                                </p>
                                <p><strong>
                                        <td>Major</td>
                                        <td>: </td>
                                    </strong>
                                    <td>{{ $apply->major }} </td>
                                    <td><strong> - {{ $apply->graduation }}</strong></td>
                                </p>
                                <p>
                                    <td> </td>
                                    <td> </td>
                                    <td>Dengan Meraih IPK {{ $apply->gpa }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><strong>
                                            <td>Course</td>
                                            <td>: </td>
                                        </strong>
                                        <li>{{ $apply->course1 }}</li>
                                        <li>{{ $apply->course2 }}</li>
                                        <li>{{ $apply->course3 }}</li>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <p><strong>
                                            <td>Experience</td>
                                            <td>: </td>
                                        </strong>
                                        <li>{{ $apply->experience1 }}</li>
                                        <li>{{ $apply->experience2 }}</li>
                                        <li>{{ $apply->experience3 }}</li>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card-img mb-5" style="border-radius: 10px">
                            @if ($apply->image)
                                <div style="max-height: 350px; overflow: hidden;" class="mt-3">
                                    <img src="{{ asset('storage/' . $apply->image) }}" class="img-fluid"
                                        alt="{{ $apply->name }}">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x400?{{ $apply->category->name }}"
                                    class="img-fluid mt-3" alt="{{ $apply->category->name }}">
                            @endif
                        </div>
                        <a href="/dashboard/apply" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Back</a>
                        <a href="/dashboard/apply/{{ $apply->id }}/edit" class="btn btn-success" target="_blank">
                            <i class="bi bi-printer-fill"></i> Cetak
                        </a>

                    </div>
                </div>
            </div>
            @include('dashboard.partials.footer')
        </div>
    </div>
@endsection
