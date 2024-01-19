<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact">

<head>
    <meta charset="utf-8">
    <meta content="idth=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>Dashboard | @yield('title', 'Dashboard')</title>

    {{-- Favicons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/dashboard/favicon/favicon.ico') }}" />

    {{-- Icons --}}
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/fonts/boxicons.css') }}" />

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    {{-- Vendor CSS Files --}}
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/css/dashboard/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/libs/apex-charts/apex-charts.css') }}" />

    {{-- Config --}}
    <script src="{{ asset('/js/dashboard/config.js') }}"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    {{-- Summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="{{ asset('js/dashboard/sweetalert2@11.js') }}">
    <script src="{{ asset('js/dashboard/sweetalert2@11.js') }}"></script>

    {{-- Style CSS --}}
    @stack('style')
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- Sidebar --}}
            @include('dashboard.layouts.sidebar')

            <div class="layout-page">

                {{-- Navbar --}}
                @include('dashboard.layouts.navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        {{-- Content --}}
                        @yield('content')
                    </div>

                    {{-- Footer --}}
                    @include('dashboard.layouts.footer')

                    <div class="content-backdrop fade"></div>
                </div>

            </div>

        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    {{-- Vendor Javascript --}}
    <script src="{{ asset('/vendor/dashboard/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/js/menu.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('/js/dashboard/main.js') }}"></script>
    <script src="{{ asset('/js/dashboard/dashboards-analytics.js') }}"></script>

    {{-- Script --}}
    <script src="{{ asset('js/dashboard/script.js') }}"></script>
    @stack('script')
</body>
</html>
