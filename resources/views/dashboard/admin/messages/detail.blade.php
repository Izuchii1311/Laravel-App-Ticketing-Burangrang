{{-- Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Dashboard | Detail Pesan')

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
                        <div class="d-flex justify-content-between">
                            @if ($message->recomend == 1)
                                <h5 class="card-title">Pesan Oleh {{ $message->name }}</h5>
                                <p class="card-link text-success" title="Pesan ini ditampilkan di menu utama"><i class='bx bxs-star'></i></p>
                            @else
                                <h5 class="card-title">Pesan Oleh {{ $message->name }}</h5>
                                <p class="card-link text-success" title="Pesan ini tidak ditampilkan di menu utama"><i class='bx bx-star'></i></p>
                            @endif
                        </div>
                        <p class="fst-italic card-subtitle mb-2 text-body-secondary" style="font-size: 12px;">Dibuat sejak {{ $message->created_at->diffForHumans() }} | {{ $message->email }}</p>
                        <p class="mt-4">
                            <span class="fw-bolder">{{ $message->title }}</span>
                            <br>
                            <span class="card-text">{{ $message->message }}</span>
                        </p>
                        <a href="{{ route('dashboard.message.show') }}" class="card-link mt-5">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- End Content --}}