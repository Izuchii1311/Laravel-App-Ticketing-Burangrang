<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide">

<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>Dashboard | @yield('title')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/fonts/boxicons.css') }}" />

    {{-- Core CSS --}}
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/css/dashboard/demo.css') }}" />

    {{-- Vendor CSS --}}
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    {{-- Template Main CSS --}}
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/pages/page-auth.css') }}" />

    {{-- Helpers --}}
    <script src="{{ asset('/vendor/dashboard/js/helpers.js') }}"></script>
    <script src="{{ asset('/js/dashboard/config.js') }}"></script>

    {{-- Style CSS --}}
    @stack('style')
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            @yield('content')
        </div>
    </div>

    {{-- Vendor JS --}}
    <script src="{{ asset('/vendor/dashboard/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/js/menu.js') }}"></script>

    {{-- Template Main JS --}}
    <script src="{{ asset('/js/dashboard/main.js') }}"></script>

    {{-- Page JS --}}
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    {{-- Script JS --}}
    @stack('script')
</body>
</html>