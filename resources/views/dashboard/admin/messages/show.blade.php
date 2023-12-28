{{-- *Dashboard Layout --}}
@extends('dashboard.layouts.main')

{{-- *Title --}}
@section('title', 'Dashboard | Pesan Pengunjung')

{{-- *Content --}}
@section('content')
    <div class="row justify-content-center">
        {{-- ? Information --}}
        <div class="col-12 card-separator">
            <h3>Rekomendasi Pesan Para Pengunjung ✌</h3>
            <div class="col-12 col-md-8">
                <p>Pesan para pengunjung ini akan ditampilkan di halaman landing page, kamu bisa menambahkan atau menghapus pesan rekomendasi para pengunjung...</p>
            </div>
        </div>

        {{-- ? Alert --}}
        <div class="alerts-container"></div>
        <br>

        {{-- ? Check if last message deleted / isEmpty --}}
        @if ($messages->isEmpty() || $messages->where('recomend', 1)->isEmpty())
            <div class="col-12">
                <p class="text-danger y-5">{{ $messages->isEmpty() ? 'Tidak ada pesan.' : 'Tidak ada pesan yang direkomendasikan' }}</p>
            </div>
        @else
            @forelse ($messages as $message)
                @if ($message->recomend == 1)
                    <div class="col-6 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                {{-- ? Card Body --}}
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $message->title }}</h5>
                                    {{-- ? Dropdown --}}
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown">
                                            <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ route('dashboard.message.detail', ['id' => $message->id]) }}" class="dropdown-item">Detail Pesan</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item remove-to-menu text-danger" data-message-id="{{ $message->id }}">Hapus dari Menu Utama</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="fst-italic card-subtitle mb-2 text-body-secondary" style="font-size: 12px;">
                                    {{ $message->name }} | {{ $message->email }}
                                </p>
                                <p class="card-text">{{ Str::limit($message->message, 150) }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12">
                    <p class="text-danger">{{ count($messages) > 0 ? 'Tidak ada pesan yang direkomendasikan' : 'Tidak ada pesan.' }}</p>
                </div>
            @endforelse
        @endif
    </div>

    <hr class="mb-2">

    {{-- ? Showing All Messages --}}
    <div class="row">
        {{-- ? Information --}}
        <div class="col-12 card-separator mb-3">
            <h5>Pesan Para Pengunjung Kawasan Gunung Burangrang.</h5>
            <div class="col-12 col-md-8">
                <p>Pesan para pengunjung mengenai website beserta daerah kawasan nyalindung dan juga Gunung Burangrang</p>
            </div>
        </div>

        <br>

        {{-- ? Check if last message deleted / isEmpty --}}
        @if ($messages->isEmpty())
            <div class="col-12">
                <p class="text-danger y-5">{{ $messages->isEmpty() ? 'Tidak ada pesan.' : 'Tidak ada pesan yang direkomendasikan' }}</p>
            </div>
        @else
            @forelse ($messages as $message)
                <div class="col-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            {{-- ? Card Body --}}
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $message->title }}
                                <h5 class="card-title">{{ $message->id }}
                                    {{-- ? Check icon recomend--}}
                                    @if($message->recomend == 1)
                                        <a href="#" class="card-link remove-to-menu" data-message-id="{{ $message->id }}"><i class='bx bxs-star'></i></a>
                                    @else
                                        <a href="#" class="card-link add-to-menu" data-message-id="{{ $message->id }}"><i class='bx bx-star'></i></a>
                                    @endif
                                </h5>
                                {{-- ? Dropdown --}}
                                <div class="d-flex align-items-center">
                                    <div class="dropdown">
                                        <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ route('dashboard.message.detail', ['id' => $message->id]) }}" class="dropdown-item">Detail Pesan</a>
                                            <div class="dropdown-divider"></div>
                                            {{-- ! Delete Button --}}
                                            <form action="{{ route('dashboard.message.delete', ['id' => $message->id]) }}" method="post" id="confirm-delete-message">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="confirmDeleteMessage()" class="dropdown-item delete-record text-danger">Hapus Pesan Pengguna</button>
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
    </div>
@endsection
{{-- *End Content --}}

{{-- *Script --}}
@section('script')
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
                        showAlert('success', 'Berhasil ' + successMessage + ' Menu utama!');
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
@endsection
{{-- *End Script --}}