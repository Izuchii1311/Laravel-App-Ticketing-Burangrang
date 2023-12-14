@extends('dashboard.layouts.main')

@section('content')
    <section class="container">
        <h3>Silahkan untuk melakukan print tiket 🖨 </h3>
        <div class="col-12 col-lg-8">
            <p>Kamu bisa melakukan print pada ticket yang telah ditambahkan sebagai sarana fasilitas yang ada.</p>
        </div>
        <div class="ticket-card">
            <div class="date">
                <time datetime="23th feb">
                    <span>{{ $ticket->status }}</span><span>{{ $ticket->cd_ticket }}</span>
                </time>
            </div>
            <div class="card-cont">
                <small>Kawasan G.Burangrang</small>
                <h3>{{ $ticket->name_ticket }}</h3>
                <div class="even-date">
                    <i class="fa fa-calendar"></i>
                    <time>
                        <span>Jam buka: {{ $ticket->start_time }}</span>
                        <span>Jam tutup: {{ $ticket->end_time }}</span>
                    </time>
                </div>
                <div class="even-info">
                    <i class="fa fa-map-marker"></i>
                    <p>
                        {{ $ticket->description }}
                    </p>
                </div>
                <a href="/dashboard/ticket/ticket">Print</a>
            </div>
        </div>
    </section>
@endsection

@section('style')
    <style>
        /* Styles remain the same for the most part */

        .ticket-card {
            display: flex;
            background-color: #fff;
            color: #989898;
            margin-bottom: 10px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            border-radius: 4px;
            position: relative;
        }

        .date {
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #dadde6;
            padding: 20px;
        }

        .date:before,
        .date:after {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #F5F5F9;
            position: absolute;
            top: -15px;
            right: -15px;
            z-index: 1;
            border-radius: 50%;
        }

        .date:after {
            top: auto;
            bottom: -15px;
        }

        .date time {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .date time span {
            display: block;
        }

        .date time span:first-child {
            color: #2b2b2b;
            font-weight: 600;
            font-size: 150%;
        }

        .date time span:last-child {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px;
        }

        .card-cont {
            width: 75%;
            font-size: 85%;
            padding: 20px;
        }

        .card-cont h3 {
            color: #3C3C3C;
            font-size: 180%;
        }

        .even-info p {
            padding: 30px 0 0;
        }

        .even-info i {
            padding: 5% 0 0 0;
        }

        .even-date i {
            padding: 5% 5% 0 0;
        }

        .even-date time span {
            display: block;
        }

        .card-cont a {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: red;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 10px;
            bottom: 10px;
        }

        @media screen and (max-width: 860px) {
            .ticket-card {
                flex-direction: column;
                align-items: center;
            }

            .date,
            .card-cont {
                width: 100%;
                text-align: center;
                border-right: none;
                padding: 20px;
            }

            .card-cont h3 {
                margin-top: 20px;
            }

            .card-cont a {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
@endsection
