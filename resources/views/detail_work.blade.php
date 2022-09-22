@extends('layouts.main')

@section('container')
    {{-- Hero --}}
    @include('hero.detail_work')

    <div class="contiainer m-5">
        <div class="work-box">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card" data-aos="fade-up" data-aos-delay="100">
                        {{-- Form Image --}}
                        @if ($work->image)
                            <img src="{{ asset('storage/' . $work->image) }}" class="card-img" alt="{{ $work->name }}">
                        @endif
                    </div>
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="200">
                    <h3>About Job - {{ $work->title }}</h3>
                    <p class="fs-5">
                        {!! $work->jobbrief !!}
                    </p>
                    <h4>Requirements</h4>
                    <p class="fs-5">{!! $work->requirements !!}</p>
                    <h6 class="fs-5">Placement : {!! $work->placement !!}</h6>
                    <h6 class="fs-5 mb-3">Deadline : Until {!! $work->deadline !!}</h6>
                    {{-- Button Back --}}
                    <a href="/work" class="work-box btn btn-danger mb-5"
                    style="color: #ffffff; font-size: 18px; font-family: Arial Narrow Bold" data-aos="fade-up" data-aos-delay="100">
                        <span class="bi bi-arrow-left"></span> Back
                    </a>
                    {{-- Button Apply --}}
                    <a href="/applywork/{{ $work->slug }}" class="work-box btn btn-primary mb-5"
                        style="color: #ffffff; font-size: 18px; font-family: Arial Narrow Bold" data-aos="fade-up" data-aos-delay="200">Apply To Position 
                        <span class="bi bi-send"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
