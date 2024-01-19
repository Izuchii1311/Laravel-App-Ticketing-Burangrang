<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>Kampung Nyalindung - @yield('title', "Kampung Nyalindung")</title>

    {{-- Favicons --}}
    <link href="{{ asset('/img/main/HuoIcon.ico') }}" rel="icon">
    <link href="{{ asset('/img/main/HuoIcon.ico') }}" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- Vendor CSS Files --}}
    <link href="{{ asset('/vendor/main/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/main/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/main/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/main/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/main/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vendor/main/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    {{-- Template Main CSS Files --}}
    <link href="{{ asset('/css/main/style.css') }}" rel="stylesheet">

    {{-- Style CSS --}}
    @stack('style')
</head>

<body>
    {{-- Header --}}
    @include('main.layouts.header')

    {{-- Container --}}
    @yield('container')

    {{-- Footer --}}
    @include('main.layouts.footer')

    <a href="#hero" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    {{-- Vendor Js Files --}}
    <script src="{{ asset('/vendor/main/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/vendor/main/aos/aos.js') }}"></script>
    <script src="{{ asset('/vendor/main/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/main/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/vendor/main/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/vendor/main/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/vendor/main/php-email-form/validate.js') }}"></script>

    {{-- Template Main Js Files --}}
    <script src="{{ asset('/js/main/main.js') }}"></script>

    {{-- Script --}}
    @stack('script')
</body>
</html>