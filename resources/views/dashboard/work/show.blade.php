@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav" class="m-3">
        <div id="layoutSidenav_content">
            {{-- @include('dashboard.') --}}
            <div class="container">
                <div class="row my-3">
                    <div class="col-lg-12">
                        @if ($work->image)
                            <div style="max-height: 350px; overflow: hidden;" class="mt-3">
                                <img src="{{ asset('storage/' . $work->image) }}" class="img-fluid"
                                    alt="">
                            </div>
                        {{-- @else
                            <img src="https://source.unsplash.com/1200x400?{{ $work->category->name }}"
                                class="img-fluid mt-3" alt="{{ $work->category->name }}"> --}}
                        @endif 
                       
                        <div class="panel my-3">
                            <a href="/dashboard/work" class="btn btn-success"><span data-feather="arrow-left"></span> Back To My
                                work</a>
                            <a href="/dashboard/work/{{ $work->slug }}/edit" class="btn btn-warning"><span
                                    data-feather="edit"></span>
                                Edit</a>
                            <form action="/dashboard/work/{{ $work->slug }}" method="work" class="d-inline"> @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"> <span data-feather="x-circle"></span> Delete</button>
                            </form>
                        </div>
                        
                        <h3 class="mb-3">About Job - {{ $work->title }}</h3>
                        <h1>Job Brief</h1>
                        <article class="my-3 fs-5">
                            {!! $work->jobbrief !!}
                        </article>

                        <h1>Requirement</h1>
                        <article class="my-3 fs-5">
                            {!! $work->requirements !!}
                        </article>

                        <p><strong>Placement : </strong> {!! $work->placement !!}</p>
                        <p><strong>Deadline : </strong> {!! $work->deadline !!}</p>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
