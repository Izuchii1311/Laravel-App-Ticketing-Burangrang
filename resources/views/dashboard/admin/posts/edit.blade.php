{{-- ? Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- ? Title --}}
@section('title', "Dashboard | Edit Postingan")

{{-- ? Content --}}
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Edit Postingan</h5>
        <div class="mx-4">
            {{-- ? Alert --}}
            @include('dashboard.admin.posts.partials.alert')
        </div>

        <form class="card-body" action="{{ route('posts.update', ['post' => $post->slug]) }}" method="post" id="transactionForm">
            @method('put')
            @csrf

            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label" for="title">Judul Postingan</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Postingan anda..." value="{{ old('title', $post->title) }}" autocomplete="off" autofocus>
                    @error('title')
                        <div class="invalid-feedback">
                            Judul Postingan wajib diisi dengan benar dan tidak boleh sama.
                        </div>
                    @enderror
                </div>

                {{-- CKEditor --}}
                <div class="col-md-12 mb-3">
                    <label class="block">
                        <span class="text-gray-700">Content Postingan</span>
                        <textarea class="form-control" id="description" name="description" placeholder="Masukan Content Postingan" rows="5" value="{{ old('description', $post->description) }}">{{ old('description', $post->description) }}</textarea>
                    </label>
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
{{-- ? End Content --}}