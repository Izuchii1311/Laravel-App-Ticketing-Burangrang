{{-- Dashboard Layouts --}}
@extends('dashboard.layouts.main')

{{-- Title --}}
@section('title', "Dashboard | Buat Ticket Baru")

{{-- Content --}}
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Buat Tiket Baru</h5>

        <form class="card-body" action="/dashboard/ticket" method="post" id="myForm">
            @csrf

            <div class="row g-3">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="col-md-6">
                    <label class="form-label" for="cd_ticket">Kode Tiket</label>
                    <input type="text" id="cd_ticket" name="cd_ticket" class="form-control @error('cd_ticket') is-invalid @enderror" placeholder="Kode tiket" value="{{ old('cd_ticket') }}" autocomplete="off" autofocus>
                    @error('cd_ticket')
                        <div class="invalid-feedback">
                            Kode tiket wajib diisi dengan benar dan tidak boleh sama.
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="name_ticket">Nama Tiket</label>
                    <input type="text" id="name_ticket" name="name_ticket" class="form-control @error('name_ticket') is-invalid @enderror" placeholder="Nama tiket" value="{{ old('name_ticket') }}" autocomplete="off">
                    @error('name_ticket')
                        <div class="invalid-feedback">
                            Nama tiket wajib diisi dengan benar.
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="price">Harga Tiket</label>
                    <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga tiket" value="{{ old('price') }}" autocomplete="off">
                    @error('price')
                        <div class="invalid-feedback">
                            Harga tiket wajib diisi dengan benar dan hanya bisa berupa angka.
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="status">Status Tiket</label>
                    <input type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Harga tiket"  value="{{ old('status', 'Open') }}" readonly disabled>
                    <p class="fst-italic" style="font-size: 0.7em;">Default status open.</p>
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
                    <input type="time" id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" value="06:00 AM" value="{{ old('start_time') }}"/>
                    <p class="fst-italic" style="font-size: 0.7em;">AM : 00:00 s/d 12:00</p>
                    @error('start_time')
                        <div class="invalid-feedback">
                            Jam buka tiket wajib diisi dengan benar.
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="end_time">Jam Tutup</label>
                    <input type="time" id="end_time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" value="20:00 PM" value="{{ old('end_time') }}"/>
                    <p class="fst-italic" style="font-size: 0.7em;">PM : 12:00 s/d 24:00</p>
                    @error('end_time')
                        <div class="invalid-feedback">
                            Jam tutup tiket wajib diisi dengan benar.
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="description">Deskripsi</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3" id="description" name="description" placeholder="Berikan detail keterangan tentang tiket..">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            Deskripsi tiket wajib diisi dengan benar.
                        </div>
                    @enderror
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submitButton">Tambah Data</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{ route('ticket.index') }}" class="btn btn-label-secondary">Kembali</a>
            </div>

        </form>
    </div>
@endsection
{{-- End Content --}}