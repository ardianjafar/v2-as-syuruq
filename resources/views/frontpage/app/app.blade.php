<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}">

    <!-- App css -->
    <link href="{{ asset('dastone/assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dastone/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dastone/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dastone/assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body>

<!-- Navbar -->
@include('frontpage.app.nav')
<!-- End Navbar -->


<!-- Content -->
@yield('content')
<!-- End Content -->

<footer class="footer text-center text-sm-left">
    Official As-Syuruqtv &copy; 2023 | <a href="https://wa.me/6285816169312"><i class="fab fa-whatsapp"> WhatsApp Kami</i></a>. <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by <a
            href="https://github.com/ardianjafar">ardianjafar</a></span>
</footer>
<!-- jQuery  -->
<script src="{{ asset('dastone/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/waves.js') }}"></script>
<script src="{{ asset('dastone/assets/js/metismenu.min.js')}}"></script>
<script src="{{ asset('dastone/assets/js/feather.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('dastone/assets/js/moment.js') }}"></script>


<!-- App js -->
<script src="{{ asset('dastone/assets/js/app.js') }}"></script>

</body>

</html>
