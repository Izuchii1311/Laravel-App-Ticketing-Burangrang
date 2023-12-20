<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Laporan Transaksi</title>
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    Hai
    @foreach ($transactions as $transaction)
        <p>
            {{ $transaction->id }};
            {{ $transaction->user_id }};
            {{ $transaction->name_cashier }};
            {{ $transaction->ticket_id }};
            {{ $transaction->cd_ticket }};
            {{ $transaction->name_ticket }};
            {{ $transaction->price }};
            {{ $transaction->amount }};
            {{ $transaction->total }};
            {{ $transaction->cus_name }};
            {{ $transaction->cd_transaction }};
            {{ $transaction->description }};
        </p>
    @endforeach

    {{-- Bootstrap Js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>