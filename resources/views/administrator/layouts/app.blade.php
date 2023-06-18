
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}">

    <!-- Plugins css -->
    <link href="{{ asset('dastone/assets/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dastone/assets/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <!-- App css -->
    <link href="{{ asset('dastone/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dastone/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dastone/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dastone/assets/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dastone/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />


    {{-- css:internal --}}
    @stack('css-internal')
    {{-- css:external --}}
    @stack('css-external')
</head>

<body class="dark-sidenav">

    @include('administrator.layouts.sidebar')

<div class="page-wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        @include('administrator.layouts.header')
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid p-3">
            @yield('content')
        </div><!-- container -->
        <!-- footer -->
        @include('administrator.layouts.footer')
        <!-- end footer -->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->


<!-- Plugins -->
<script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>

<!-- jQuery  -->
<script src="{{ asset('dastone/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/waves.js') }}"></script>
<script src="{{ asset('dastone/assets/js/feather.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/moment.js') }}"></script>
<script src="{{ asset('dastone/assets/daterangepicker/daterangepicker.js')}}"></script>


<!-- Plugins -->
<script src="{{ asset('dastone/assets/select2/select2.min.js')}}"></script>
<script src="{{ asset('dastone/assets/pages/jquery.forms-advanced.js')}}"></script>
<script src="{{ asset('dastone/assets/js/app.js')}}"></script>


@include('sweetalert::alert')
{{-- javascript:external --}}
@stack('javascript-external')
{{-- javascript:internal --}}
@stack('javascript-internal')
</body>

</html>
