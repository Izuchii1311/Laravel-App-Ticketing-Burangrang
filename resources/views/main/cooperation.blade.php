{{-- Cooperation Page --}}
@extends('main.layouts.main')

{{-- Title --}}
@section('title', 'Berita')

{{-- Container --}}
@section('container')
    {{-- Main Section --}}
    <main id="main">
        {{-- Breadcrumbs --}}
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inner Page</h2>
                    <ol>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Inner Page</li>
                    </ol>
                </div>

            </div>
            </section>

            {{-- Content --}}
            <section class="inner-page">
                <div class="container">
                    <p> Kerja Sama </p>
                </div>
        </section>
    </main>
    {{-- End Main Section --}}
@endsection

{{-- Sript --}}
@section('script')
    <script>
        const header = document.querySelector('#header.header-transparent');
        header.classList.remove('header-transparent');
    </script>
@endsection