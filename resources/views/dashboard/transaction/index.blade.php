{{-- Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', "Dashboard | Data Transaksi")

{{-- Content --}}
@section('content')
    <div class="card bg-transparent shadow-none border-0 my-4">
        {{-- Information --}}
        <div class="card-body row p-0 pb-3">
            <div class="col-12 col-md-8 card-separator">
                <h3>Transaksi Tiketing </h3>
                <div class="col-12 col-lg-8">
                    <p>Lakukan Transaksi pada aplikasi, dan dapatkan kemudahan dengan menggunakannya.</p>
                </div>
                {{-- Alert --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="menu-icon tf-icons bx bx-check me-2 mb-1"></i>
                        <strong>Selamat</strong>, Kamu {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('warning'))
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="menu-icon tf-icons bx bx-check me-2 mb-1"></i>
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- End Alert --}}
                <div class="d-flex">
                    <a href="{{ route('transaction.report') }}" class="btn btn-primary">Laporan Keuangan 📈</a>
                    <a href="" class="btn btn-success mx-4">Cetak Laporan 📋</a>
                    <a href="" class="btn btn-info">Download Laporan 📄</a>
                </div>
            </div>

            <div class="col-12 col-md-4 ps-md-3 ps-lg-5 pt-3 pt-md-0">
                <div class="d-flex justify-content-between align-items-center" style="position: relative;">
                    <div>
                        <div>
                            <h5 class="mb-2"><a href="{{ route('transaction.create') }}">Tambah Transaksi Baru</a></h5>
                            <p class="mb-4">Ceritanya Buat Filter</p>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 280px; height: 141px;">
                            </div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Data --}}
    <div class="row">
        <div class="col-md-12 col-lg-12 mb-0">
            <div class="card">
                <h5 class="card-header fw-bolder">Data Tiket</h5>
                <div class="card-datatable table-responsive">
                    <table class="invoice-list-table table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kasir</th>
                                <th>Kode Tiket</th>
                                <th>Nama Tiket</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Nama Pelanggan</th>
                                <th>Kode Transaksi</th>
                                <th class="cell-fit">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->name_cashier }}</td>
                                    <td>{{ $transaction->cd_ticket }}</td>
                                    <td>{{ $transaction->name_ticket }}</td>
                                    <td>Rp.{{ $transaction->price }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>Rp.{{ $transaction->total }}</td>
                                    <td>{{ $transaction->cus_name }}</td>
                                    <td>{{ $transaction->cd_transaction }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="dropdown">
                                                <a href="" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a href="{{ route('transaction.show', ['transaction' => $transaction->cd_transaction]) }}" class="dropdown-item">Detail Transaksi</a>
                                                    <a href="{{ route('transaction.edit', ['transaction' => $transaction->cd_transaction]) }}" class="dropdown-item">Edit Transaksi</a>
                                                <div class="dropdown-divider"></div>
                                                {{-- <form action="/dashboard/transaction/{{ $transaction->id }}" method="post" id="confirm-delete"> --}}
                                                <form action="{{ route('transaction.destroy', ['transaction' => $transaction->cd_transaction]) }}" method="post" id="confirm-delete">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="dropdown-item delete-record text-danger" onclick="confirmDelete()">Hapus Transaksi</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr class="text-center">
                                <td colspan="10" class="text-center py-5">
                                    <p class="">
                                        <h3>Tidak ada transaksi.</h3>
                                        <a href="{{ route('transaction.create') }}" class="text-secondary">Buat transaksi baru</a>
                                    </p>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- End Content --}}