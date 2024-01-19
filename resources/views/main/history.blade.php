{{-- Main Layouts --}}
@extends('main.layouts.main')

{{-- Title --}}
@section('title', 'Berita')

{{-- Container --}}
@section('container')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Inner Page</h2>
                    <ol>
                        <li>
                            <a href="{{ route('main.index') }}">Home</a>
                        </li>
                        <li>Inner Page</li>
                    </ol>
                </div>

            </div>
        </section>

        <section class="inner-page">
            <div class="container">
                <p> Sejarah Nyalindung </p>
            </div>
        </section>
    </main>
@endsection

{{-- Script --}}
@push('script')
    <script>
        const header = document.querySelector('#header.header-transparent');
        header.classList.remove('header-transparent');
    </script>
@endpush