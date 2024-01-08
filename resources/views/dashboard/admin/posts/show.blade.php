{{-- Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Dashboard | Detail Postingan')

{{-- Content --}}
@section('content')
    <div class="row justify-content-center">
        {{-- Information --}}
        <div class="col-12 card-separator">
            <h3>Detail Pesan ✌ </h3>
            <div class="col-12 col-md-8">
                <p>Pesan para pengunjung ini akan ditampilkan di halaman landing page, kamu bisa menambahkan atau menghapus pesan rekomendasi para pengunjung...</p>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p class="mt-4">{{ $post->title }}</p>
                        <p>{!! $post->description !!}</p>
                        <a href="{{ url()->previous() }}" class="text-decoration-none card-link mt-5">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- End Content --}}