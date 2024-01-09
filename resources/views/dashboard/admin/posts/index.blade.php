{{-- ? Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- ? Title --}}
@section('title', "Dashboard | Semua Postingan")

{{-- ? Content --}}
@section('content')
    <div class="card bg-transparent shadow-none border-0 my-4">
        {{-- * Information --}}
        <div class="card-body row p-0 pb-3">
            <div class="col-md-8 card-separator">
                <h3>Postingan</h3>
                <div class="col-md-8">
                    <p>Kelola postingan, tambah edit dan hapus postingan sesuai dengan keinginan anda.</p>
                </div>

                {{-- * Alert --}}
                @include('dashboard.admin.posts.partials.alert')
            </div>
            <div class="col-12 col-md-4 ps-md-3 ps-lg-5 pt-3 pt-md-0">
                <div class="d-flex justify-content-between align-items-center" style="position: relative;">
                    <div>
                        <div>
                            <h5 class="mb-2"><a href="{{ route('posts.create') }}" class="text-primary">Buat Postingan Baru</a></h5>
                            <p>Ayo buat postingan baru yang menarik dan juga memiliki informasi penting.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- * Data --}}
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-0">

            {{-- * Card --}}
            <div class="card">

                {{-- * Information --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-header fw-bolder">Data Transaksi</h5>
                    {{-- ? Search --}}
                    <div class="mx-4 col-md-6">
                        <form action="{{ route('posts.index') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari Postingan" name="search" value="{{ request('search') }}">
                                <button type="submit" id="search" class="input-group-text bg-secondary text-white"><i class='bx bx-search-alt-2'></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-datatable table-responsive">
                    <table class="invoice-list-table table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Postingan</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th class="cell-fit">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>Izuchii</td>
                                    <td>??</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="dropdown-item">Detail Postingan</a>
                                                    <a href="{{ route('posts.edit', ['post' => $post->slug]) }}" class="dropdown-item">Edit Postingan</a>
                                                <div class="dropdown-divider"></div>
                                                {{-- ! Delete Postingan --}}
                                                    <form action="{{ route('posts.destroy', ['post' => $post->slug]) }}" method="post" id="confirm-delete-{{ $post->slug }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" onclick="confirmDelete('{{ $post->slug }}')" class="dropdown-item delete-record text-danger">Hapus Postingan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                {{--  --}}
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- ? End Content --}}