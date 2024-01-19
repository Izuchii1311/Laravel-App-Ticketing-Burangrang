{{-- Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Pesan Pengunjung')

{{-- Content --}}
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 card-separator">
            <h3>Rekomendasi Pesan Para Pengunjung ✌</h3>
            <div class="col-12 col-md-8">
                <p>Pesan para pengunjung ini akan ditampilkan di halaman landing page, kamu bisa menambahkan atau menghapus pesan rekomendasi para pengunjung...
                    <br><br>
                    <span class="fst-italic">
                        (Hanya 10 Pesan yang Akan di Tampilkan Di Menu Utama.)
                        -
                        Kamu bisa memilih pesan pengunjung sesuai dengan yang diinginkan
                    </span>
                </p>
            </div>
        </div>

        {{-- Alert --}}
        @include('dashboard.layouts.partials.alert')

        @if ($recomends->isEmpty() || $recomends->where('recomend', 1)->isEmpty())
            <div class="col-12">
                <p class="text-danger y-5">{{ $recomends->isEmpty() ? 'Tidak ada pesan.' : 'Tidak ada pesan yang direkomendasikan' }}</p>
            </div>
        @else
            @forelse ($recomends as $recomend)
                @if ($recomend->recomend == 1)
                    <div class="col-6 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ Str::limit($recomend->title, 35) }}</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown">
                                            <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('dashboard.message.detail', ['slug' => $recomend->slug]) }}" class="dropdown-item">Detail Pesan</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item remove-to-menu text-danger" data-message-id="{{ $recomend->id }}">Hapus dari Menu Utama</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="fst-italic card-subtitle mb-2 text-body-secondary" style="font-size: 12px;">
                                    {{ $recomend->name }} | {{ $recomend->email }}
                                </p>
                                <p class="card-text">{{ Str::limit($recomend->message, 150) }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <p class="text-danger">{{ count($recomends) > 0 ? 'Tidak ada pesan yang direkomendasikan' : 'Tidak ada pesan.' }}</p>
                </div>
            @endforelse
        @endif

    </div>

    <hr class="my-5">

    <div class="row">
        <div class="col-12 card-separator mb-3 d-flex">
            <div class="col-md-6">
                <h5>Pesan Para Pengunjung Kawasan Gunung Burangrang.</h5>
                    <p>Pesan para pengunjung mengenai website beserta daerah kawasan nyalindung dan juga Gunung Burangrang</p>
            </div>
            {{-- ? Search --}}
            <div class="col-md-6">
                <form action="{{ route('dashboard.message.show') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Pesan Pengunjung" name="search" value="{{ request('search') }}">
                        <button type="submit" id="search" class="input-group-text bg-secondary text-white"><i class='bx bx-search-alt-2'></i></button>
                    </div>
                </form>
            </div>
        </div>

        <br>

        @if ($messages->isEmpty())
            <div class="col-12">
                <p class="text-danger y-5">{{ $messages->isEmpty() ? 'Tidak ada pesan.' : 'Tidak ada pesan yang direkomendasikan' }}</p>
            </div>
        @else
            @forelse ($messages as $message)
                <div class="col-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ Str::limit($message->title, 35) }}
                                    @if($message->recomend == 1)
                                        <a href="#" class="card-link remove-to-menu" data-message-id="{{ $message->id }}"><i class='bx bxs-star'></i></a>
                                    @else
                                        <a href="#" class="card-link add-to-menu" data-message-id="{{ $message->id }}"><i class='bx bx-star'></i></a>
                                    @endif
                                </h5>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown">
                                        <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('dashboard.message.detail', ['slug' => $message->slug]) }}" class="dropdown-item">Detail Pesan</a>

                                            <div class="dropdown-divider"></div>

                                            <form action="{{ route('dashboard.message.delete', ['slug' => $message->slug]) }}" method="post" id="confirm-delete-{{ $message->slug }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="dropdown-item delete-record text-danger">Hapus Pesan Pengguna</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="fst-italic card-subtitle mb-2 text-body-secondary" style="font-size: 12px;">
                                {{ $message->name }} | {{ $message->email }}
                            </p>
                            <p class="card-text">{{ Str::limit($message->message, 150) }}</p>
                            {{-- ? Check button recomend--}}
                            @if ($message->recomend == 1)
                                <a href="#" class="card-link remove-to-menu text-danger" data-message-id="{{ $message->id }}">Hapus dari Menu Utama</a>
                            @else
                                <a href="#" class="card-link add-to-menu" data-message-id="{{ $message->id }}">Tambahkan Ke Menu</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-danger">Tidak ada pesan.</p>
                </div>
            @endforelse
        @endif
        <div class="my-4 d-flex justify-content-between">
            @if ($messages->count() > 0 )
                <div>
                    Showing {{($messages->currentpage()-1)*$messages->perpage()+1}} to {{$messages->currentpage()*$messages->perpage()}}
                    of {{$messages->total()}} data message.
                </div>
                <div>
                    {{ $messages->onEachSide(1)->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

{{-- Script --}}
@push('script')
    <script>
        $(document).ready(function() {
            // Function to handle adding or removing from the menu
            function updateMenu(action, messageId) {
                $.ajax({
                    type: 'POST',
                    url: '/dashboard/message/' + messageId + '/' + action + '-to-menu',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success:', response);
                        const successMessage = (action === 'add') ? 'ditambahkan ke' : 'dihilangkan dari';
                        if (response.success) {
                            showAlert('success', 'Berhasil ' + successMessage + ' Menu utama!');
                        } else {
                            showAlert('error', response.error);
                        }
                    },
                    error: function(error) {
                        console.log('Error:', error);
                        const errorMessage = (action === 'add') ? 'Gagal menambahkan ke' : 'Gagal dihapus dari';
                        showAlert('error', errorMessage + ' menu!');
                    }
                });
            }

            // Click event for adding to menu
            $('.add-to-menu').click(function(e) {
                e.preventDefault();
                const messageId = $(this).data('message-id');
                updateMenu('add', messageId);
            });

            // Click event for removing from menu
            $('.remove-to-menu').click(function(e) {
                e.preventDefault();
                const messageId = $(this).data('message-id');
                updateMenu('remove', messageId);
            });

            // Fungsi untuk menampilkan alert
            function showAlert(type, message) {
                const alertClass = (type === 'success') ? 'alert-success' : 'alert-danger';

                const alertHtml = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                                    '<strong>' + ((type === 'success') ? 'Berhasil' : 'Error') + ':</strong> ' + message +
                                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>';

                // Tambahkan alert ke elemen dengan class "alerts-container"
                $('.alerts-container').append(alertHtml);

                setTimeout(function() {
                    location.reload();
                }, 1);
            }
        });
    </script>
@endpush