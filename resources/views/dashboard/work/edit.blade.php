@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav" class="m-3">
        <div id="layoutSidenav_content">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit work</h1>
            </div>

            <div class="col-lg-8">
                <form method="post" action="/dashboard/work/{{ $work->slug }}" class="mb-5" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text"
                            class="form-control @error('title')
                  is-invalid
              @enderror"
                            id="title" name="title" required autofocus value="{{ old('title', $work->title) }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text"
                            class="form-control @error('slug')
              is-invalid
          @enderror" id="slug"
                            name="slug" required value="{{ old('slug', $work->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label " for="image">work Image</label>
                        <input type="hidden" name="oldImage" value="{{ $work->image }}">
                        @if ($work->image)
                            <img src="{{ asset('storage/' . $work->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" required
                            value="{{ old('body', $work->body) }}">
                        <trix-editor input="body"></trix-editor>
                    </div> --}}
                    <div class="mb-3">
                        <label for="jobbrief" class="form-label">Job Brief</label>
                        @error('jobbrief')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="jobbrief" type="hidden" name="jobbrief" required value="{{ old('jobbrief', $work->jobbrief) }}">
                        <trix-editor input="jobbrief"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requirements</label>
                        @error('requirements')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="requirements" type="hidden" name="requirements" required value="{{ old('requirements', $work->requirements) }}">
                        <trix-editor input="requirements"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="placement" class="form-label">Placement</label>
                        <input type="text" class="form-control @error('placement') is-invalid @enderror" id="placement"
                            name="placement" required autofocus value="{{ old('placement', $work->placement) }}">
                        @error('placement')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="text" class="form-control @error('deadline') is-invalid @enderror" id="deadline"
                            name="deadline" required autofocus value="{{ old('deadline', $work->deadline) }}">
                        @error('deadline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <a href="/dashboard/work" class="btn btn-danger">
                        <span data-feather="arrow-left"></span> Back
                    </a>
                    <button type="submit" class="btn btn-primary"><span data-feather="send"></span> Update work</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/work/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
