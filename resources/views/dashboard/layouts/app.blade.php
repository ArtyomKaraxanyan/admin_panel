<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/theme-dark.css') }}" rel="stylesheet">

</head>

<body class="dark-mode">

<!-- ======= Header ======= -->
@include('dashboard.layouts.header')
<!-- ======= Sidebar ======= -->
@include('dashboard.layouts.sidebar')
<!-- End Sidebar-->

<main id="main" class="main">
    @include('dashboard.partials.flash_messages')
    @yield('content')
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('dashboard/js/plugins/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/sweetalert2.all.js') }}"></script>
<script src="{{ asset('dashboard/js/main.js') }}"></script>

</body>

</html>
