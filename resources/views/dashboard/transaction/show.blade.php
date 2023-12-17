@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3 mt-3 p-3">
            <div class="row">
                <div class="col-md-4">
                    <img class="card-img card-img-left" src="https://source.unsplash.com/800x1000?mountain" alt="Card image" style="height: 100%">
                </div>
                <div class="col-md-8 p-2">
                    <h4>Data Transaksi Pelanggan</h4>
                    <p>
                        <strong>Kode Transaksi {{ $transaction->cd_transaction }}</strong> <br>
                        Nama Customer : {{ $transaction->cus_name }} <br>
                        Nama Kasir : {{ $transaction->name_cashier }} <hr>
                        Kode Tiket : {{ $transaction->cd_ticket }} <br>
                        Nama Tiket : {{ $transaction->name_ticket }} <br>
                        Jumlah Tiket : {{ $transaction->amount }} <br>
                        Harga Tiket : {{ $transaction->price }} <br>
                        Total : {{ $transaction->total }} <hr>

                        <p>Deskripsi Pembelian
                            <br>
                            {{ $transaction->description }}
                        </p>
                    </p>
                    <p><small class="text-muted">Created in {{ $transaction->created_at->diffForHumans() }}</small></p>

                    <a href="{{ route('transaction.index') }}" class="text-decoration-none">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection