{{-- Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', 'Dashboard | Tambah Transaksi Baru')

{{-- Content --}}
@section('content')
    <div class="card">
        {{-- Information --}}
        <h5 class="card-header">Tambah Transaksi Tiket</h5>
        {{-- Card --}}
        <div class="card-body">
            <form action="{{ route('transaction.index') }}" method="post" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" onsubmit="save.data.disabled = true; return disabledButton();">
                @csrf

                <!-- Cashier Information -->
                <div class="col-12">
                    <h6>1. Informasi</h6>
                    <hr class="mt-0 p-0 m-0">
                </div>

                {{-- Id User --}}
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                {{-- Name Cashier -> get from user name --}}
                <div class="col-md-6 fv-plugins-icon-container my-4">
                    <label class="form-label" for="name_cashier">Nama Kasir</label>
                    <input type="hidden" name="name_cashier" value="{{ auth()->user()->name }}">
                    <input type="text" id="name_cashier" class="form-control" placeholder="Izuchii" name="name_cashier" value="{{ auth()->user()->name }}" readonly disabled>
                </div>

                {{-- Name Customer --}}
                <div class="col-md-6 fv-plugins-icon-container my-4">
                    <label class="form-label" for="cus_name">Nama Pelanggan</label>
                    <input type="text" id="cus_name" class="form-control @error('cus_name') is-invalid @enderror" placeholder="Masukan nama pelanggan..." name="cus_name" value="{{ old('cus_name') }}" autocomplete="off" autofocus>
                    @error('cus_name')
                        <div class="invalid-feedback">
                            Nama pelanggan wajib diisi dengan benar.
                        </div>
                    @enderror
                </div>

                <!-- Ticket Information -->
                <div class="col-12">
                    <h6>2. Informasi Tiket</h6>
                    <hr class="mt-0 p-0 m-0">
                </div>

                <div class="row my-4">
                    <div class="col-md-6 d-flex flex-column">
                        {{-- Input Amount Ticket --}}
                        <div class="col-md-12 fv-plugins-icon-container">
                            <label class="form-label" for="amount">Jumlah Tiket</label>
                            <input type="text" id="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Masukan jumlah pengunjung..." name="amount" value="{{ old('amount') }}" autocomplete="off">
                            @error('amount')
                                <div class="invalid-feedback">
                                    Jumlah pengunjung wajib diisi dengan benar dan harus berupa angka.
                                </div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 fv-plugins-icon-container">
                            <label class="form-label" for="description">Keterangan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    Keterangan wajib diisi dengan benar.
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column">
                        {{-- Choose Ticket --}}
                        <div class="row gy-3 mt-0">
                            <p class="fst-italic mb-0">Pilih salah satu tiket.</p>
                            @forelse ($tickets as $ticket)
                                @if ($ticket->status === 'open')
                                    <div class="col-12 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                        <div class="form-check custom-option custom-option-icon">
                                            <input class="form-check-input" type="checkbox" name="selectedTickets[]" id="ticket{{ $ticket->id }}" value="{{ $ticket->id }}">
                                            <label class="form-check-label custom-option-content" for="ticket{{ $ticket->id }}">
                                                <span class="custom-option-body">
                                                    <input type="hidden" name="ticket_id" value={{ $ticket->id }}>

                                                    <i class="bx bx-landscape"></i>
                                                    <span class="custom-option-title">{{ $ticket->name_ticket }}</span>
                                                    <br>
                                                    <small>{{ $ticket->description }} (Rp. {{ $ticket->price }}/orang)</small>
                                                    <br>
                                                    <small>{{ $ticket->start_time }} - {{ $ticket->end_time }}</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- Status Closed --}}
                                @else
                                    <div class="col-12 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                        <div class="form-check custom-option custom-option-icon">
                                            <input class="form-check-input" type="checkbox" name="selectedTickets[]" id="ticket{{ $ticket->id }}" value="{{ $ticket->id }}" disabled>
                                            <label class="form-check-label custom-option-content" for="ticket{{ $ticket->id }}">
                                                <span class="custom-option-body">
                                                    <i class="bx bx-landscape text-danger"></i>
                                                    <span class="custom-option-title text-danger">{{ $ticket->name_ticket }} <span class="fw-bolder">(Closed)</span></span>
                                                    <br>
                                                    <small class="text-danger">{{ $ticket->description }} (Rp. {{ $ticket->price }}/orang)</small>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div>Tidak ada tiket</div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Button --}}
                @if ($allClosed)
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="save-data" id="submitButton" disabled>Tambah Transaksi</button>
                        <button type="reset" class="btn btn-danger" disabled>Reset</button>
                        <a href="{{ route('transaction.index') }}" class="btn btn-label-secondary">Kembali</a>
                    </div>
                @else
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="save-data" id="submitButton">Tambah Transaksi</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a href="{{ route('transaction.index') }}" class="btn btn-label-secondary">Kembali</a>
                    </div>
                @endif
                </form>
            </div>

        </div>
    </div>
@endsection
{{-- End Content --}}
