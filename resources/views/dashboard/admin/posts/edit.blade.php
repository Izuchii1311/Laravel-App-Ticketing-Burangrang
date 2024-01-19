{{-- Include Main Layout Dashboard --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', "Dashboard | Edit Postingan")

{{-- Content --}}
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Edit Postingan</h5>
        <div class="mx-4">

            {{-- Alert --}}
            @include('dashboard.layouts.partials.alert')
        </div>

        <form class="card-body" action="{{ route('posts.update', ['post' => $post->slug]) }}" method="post" id="postForm" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="title">Judul Postingan</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Postingan anda..." value="{{ old('title', $post->title) }}" autocomplete="off" autofocus>
                    @error('title')
                        <div class="invalid-feedback">
                            Judul Postingan wajib diisi dengan benar dan tidak boleh sama.
                        </div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="description">Content Postingan</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Masukan Content Postingan" rows="15">{{ old('description', $post->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            Content postingan wajib diisi dengan benar dan tidak boleh sama.
                        </div>
                    @enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submitButton">Tambah Postingan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{ url()->previous() }}" class="btn text-decoration-none">Kembali</a>
            </div>
        </form>

    </div>
@endsection

{{-- Script --}}
@push('script')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 5,
                height: 500,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'italic']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                ]
            });
        });
    </script>
@endpush
