<div class="row justify-content-center">
    <div class="col-12 card-separator">
        <h3>Rekomendasi Pesan Para Pengunjung ✌</h3>
        <div class="col-12 col-md-8">
            <p>Pesan para pengunjung ini akan ditampilkan di halaman landing page, kamu bisa menambahkan atau menghapus pesan rekomendasi para pengunjung...</p>
        </div>
    </div>

    {{-- Alert --}}
    @include('dashboard.layouts.partials.alert')

    @if ($messages->isEmpty() || $messages->where('recomend', 1)->isEmpty())
        <div class="col-12">
            <p class="text-danger y-5">{{ $messages->isEmpty() ? 'Tidak ada pesan.' : 'Tidak ada pesan yang direkomendasikan' }}</p>
        </div>
    @else
        @forelse ($recomend as $re)
            @if ($re->recomend == 1)
                <div class="col-6 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ Str::limit($re->title, 35) }}</h5>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown">
                                        <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('dashboard.message.detail', ['slug' => $re->slug]) }}" class="dropdown-item">Detail Pesan</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item remove-to-menu text-danger" data-message-id="{{ $re->id }}">Hapus dari Menu Utama</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="fst-italic card-subtitle mb-2 text-body-secondary" style="font-size: 12px;">
                                {{ $re->name }} | {{ $re->email }}
                            </p>
                            <p class="card-text">{{ Str::limit($re->message, 150) }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12">
                <p class="text-danger">{{ count($recomend) > 0 ? 'Tidak ada pesan yang direkomendasikan' : 'Tidak ada pesan.' }}</p>
            </div>
        @endforelse
    @endif

</div>