<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  {{-- Favicon --}}
  <link rel="icon" type="image/x-icon" href="{{ asset('/img/dashboard/favicon/favicon.ico') }}" />

  {{-- Bootstrap Stylesheet --}}
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <title>Laporan Transaksi</title>
</head>
<body>
  {{-- * Information --}}
  <div class="container my-4">
    <h3 class="text-center">Semua Laporan Transaksi Tiketing</h3>
    <p class="text-center">Laporan ini mencakup semua data ticketing yang sudah dihapus dan belum pernah dihapus sama sekali</p>
    <a href="{{ route('transaction.report_pdf') }}" class="text-center d-block">Download Laporan</a>
  </div>

  <div class="mx-4">
    {{-- * Table --}}
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Transaksi</th>
          <th scope="col">Nama Kasir</th>
          <th scope="col">Kode Tiket</th>
          <th scope="col">Nama Pelanggan</th>
          <th scope="col">Nama Tiket</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($transactions as $transaction)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaction->cd_transaction }}</td>
            <td>{{ $transaction->name_cashier }}</td>
            <td>{{ $transaction->cd_ticket }}</td>
            <td>{{ $transaction->cus_name }}</td>
            <td>{{ $transaction->name_ticket }}</td>
            <td>{{ $transaction->price }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->total }}</td>
          </tr>
        @empty
        <tr class="text-center">
          <td colspan="9" class="text-center py-5">
              <p class="">
                  <h3>Tidak ada transaksi.</h3>
              </p>
          </td>
      </tr>
        @endforelse
      </tbody>
    </table>
  </div>

    {{-- Bootstrap Js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>