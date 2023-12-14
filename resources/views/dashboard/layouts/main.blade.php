<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/dashboard/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/css/dashboard/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/dashboard/libs/apex-charts/apex-charts.css') }}" />

    {{-- Sweet Alert --}}
    <!-- Include SweetAlert CSS and JS -->
    <link rel="stylesheet" href="{{ asset('js/dashboard/sweetalert2@11.js') }}">
    <script src="{{ asset('js/dashboard/sweetalert2@11.js') }}"></script>

    <!-- Helpers -->
    <script src="{{ asset('/vendor/dashboard/js/helpers.js') }}"></script>
    <script src="{{ asset('/js/dashboard/config.js') }}"></script>

    {{-- Style inline css --}}
    @yield('style')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            {{-- Sidebar Section --}}
            @include('dashboard.layouts.sidebar')
            {{-- End Sidebar Section --}}

            <!-- Layout container -->
            <div class="layout-page">

                {{-- Navbar Section --}}
                @include('dashboard.layouts.navbar')
                {{-- End Navbar Section --}}

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Content -->
                        @yield('content')
                        <!-- / Content -->

                    </div>
                    {{-- End Content --}}

                    {{-- Footer Section --}}
                    @include('dashboard.layouts.footer')
                    {{-- End Footer Section --}}

                    <div class="content-backdrop fade"></div>
                </div>
            <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <script src="{{ asset('/vendor/dashboard/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/vendor/dashboard/js/menu.js') }}"></script>

    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{ asset('/vendor/dashboard/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/js/dashboard/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('/js/dashboard/dashboards-analytics.js') }}"></script>

    {{-- My Script --}}
    <script src="{{ asset('js/dashboard/script.js') }}"></script>
</body>
</html>
