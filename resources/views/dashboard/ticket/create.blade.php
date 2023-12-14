@extends('dashboard.layouts.main')

@section('content')
<div class="card mb-4">
    <h5 class="card-header">Buat Tiket Baru</h5>
    <form class="card-body" action="/dashboard/ticket" method="post">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="cd_ticket">Kode Tiket</label>
                <input type="text" id="cd_ticket" name="cd_ticket" class="form-control" placeholder="Kode tiket">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="name_ticket">Nama Tiket</label>
                <input type="text" id="name_ticket" name="name_ticket" class="form-control" placeholder="Nama tiket">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="price">Harga Tiket</label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Harga tiket">
            </div>
        </div>
        <div class="row g-3 py-3">
            <div class="col-md-6">
                <label class="form-label" for="start_time">Jam Buka</label>
                <input type="time" id="start_time" name="start_time" class="form-control" value="06:00 AM" />
                <p class="fst-italic" style="font-size: 0.7em;">AM : 00:00 s/d 12:00</p>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="end_time">Jam Tutup</label>
                <input type="time" id="end_time" name="end_time" class="form-control" value="20:00 PM" />
                <p class="fst-italic" style="font-size: 0.7em;">PM : 12:00 s/d 24:00</p>
            </div>
            <div class="col-md-12">
                <label class="form-label" for="description">Deskripsi</label>
                <textarea class="form-control" rows="3" id="description" name="description" placeholder="Berikan detail keterangan tentang tiket.."></textarea>
            </div>
        </div>
        <div class="pt-4">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary">Cancel</button>
        </div>
    </form>
</div>
@endsection