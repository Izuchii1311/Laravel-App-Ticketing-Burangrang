{{-- Main Layout --}}
@extends('main.layouts.main')

@section('title', 'Berita')

@section('container')
    {{-- Main Section --}}
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <h2>Inner Page</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Inner Page</li>
            </ol>
            </div>

        </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
        <div class="container">
            <p>
            Berita
            </p>
        </div>
        </section>
    </main>
    {{-- End Main Section --}}
@endsection

@section('script')
    <script>
        const header = document.querySelector('#header.header-transparent');
        header.classList.remove('header-transparent');
    </script>
@endsection