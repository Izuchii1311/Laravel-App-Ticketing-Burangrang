{{-- ? Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- ? Title --}}
@section('title', "Dashboard | Edit Tiket")

{{-- ? Content --}}
@section('content')
<div class="card mb-4">
    {{-- * Information --}}
    <h5 class="card-header">Edit Tiket</h5>
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mx-4" role="alert">
            <i class="menu-icon tf-icons bx bx-error-circle me-2 mb-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form class="card-body" action="{{ route('ticket.update', ['ticket' => $ticket->cd_ticket]) }}" method="post"  id="transactionForm">
        @method('put')
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="cd_ticket">Kode Tiket</label>
                <input type="text" id="cd_ticket" name="cd_ticket" class="form-control @error('cd_ticket') is-invalid @enderror" placeholder="Kode tiket" value="{{ old('cd_ticket', $ticket->cd_ticket) }}" autocomplete="off" autofocus>
                @error('cd_ticket')
                    <div class="invalid-feedback">
                        Kode tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_ticket">Nama Tiket</label>
                <input type="text" id="name_ticket" name="name_ticket" class="form-control @error('name_ticket') is-invalid @enderror" placeholder="Nama tiket" value="{{ old('name_ticket', $ticket->name_ticket) }}" autocomplete="off">
                @error('name_ticket')
                    <div class="invalid-feedback">
                        Nama tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="price">Harga Tiket</label>
                <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga tiket"  value="{{ old('price', $ticket->price) }}" autocomplete="off">
                @error('price')
                    <div class="invalid-feedback">
                        Harga tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="status">Status Tiket</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option disabled selected>Pilih Status Tiket</option>
                    <option value="open" {{ old('status', $ticket->status) === 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status', $ticket->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        Status tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
        </div>
        <div class="row g-3 py-3">
            <div class="col-md-6">
                <label class="form-label" for="start_time">Jam Buka</label>
                <input type="text" id="start_time" name="start_time" class="form-control mb-2" value="{{ old('start_time', $ticket->start_time) }}" disabled/>
                <input type="time" id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" placeholder="06:00 AM" value="{{ old('start_time', $ticket->start_time) }}"/>
                <p class="fst-italic" style="font-size: 0.7em;">AM : 00:00 s/d 12:00</p>
                @error('start_time')
                    <div class="invalid-feedback">
                        Jam buka tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="end_time">Jam Tutup</label>
                <input type="text" id="end_time" name="end_time" class="form-control mb-2" value="{{ old('end_time', $ticket->end_time) }}" disabled/>
                <input type="time" id="end_time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" placeholder="20:00 PM" value="{{ old('end_time', $ticket->end_time) }}"/>
                <p class="fst-italic" style="font-size: 0.7em;">PM : 12:00 s/d 24:00</p>
                @error('end_time')
                    <div class="invalid-feedback">
                        Jam tutup tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label class="form-label" for="description">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="3" id="description" name="description" placeholder="Berikan detail keterangan tentang tiket..">{{ old('description', $ticket->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        Deskripsi tiket wajib diisi dengan benar.
                    </div>
                @enderror
            </div>
        </div>
        <div class="pt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submitButton">Update Data</button>
            <a href="{{ route('ticket.index') }}" class="btn btn-label-secondary">Kembali</a>
        </div>

    </form>
</div>
@endsection
{{-- ? End Content --}}