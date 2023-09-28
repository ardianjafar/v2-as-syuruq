<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        {{-- {{ config('app.name')  }} | {{ @yield('title') }} --}}
        {{ config('app.name') }} | @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('vendor/my-auth/css/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body{
            padding:100px 0;
            background-color:#efefef
        }
        a, a:hover{
            color:#333
        }
    </style>
</head>

<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">
                                    Bismillah
                                </h3>
                            </div>
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        @include('layouts._auth.footer')
    </div>
</div>
<script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/my-auth/js/auth.js') }}"></script>
@stack('javascript-internal')

</body>

</html>
