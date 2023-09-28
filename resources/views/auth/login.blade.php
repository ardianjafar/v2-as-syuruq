@extends('layouts.auth')
@section('title','Login')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="small mb-1" for="input_login_email">Email</label>
            <input name="email" class="form-control py-4 @error('email') is-invalid @enderror" value="{{ old('email') }}" id="input_login_email" type="email" placeholder="Enter email address" autocomplete="email"/>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
{{--        <div class="form-group">--}}
{{--            <label class="small mb-1" for="input_login_password">Password</label>--}}
{{--            <input name="password" class="form-control py-4 @error('password') is-invalid @enderror" id="input_login_password" type="password" placeholder="Enter password" autocomplete="current-password" />--}}
{{--            @error('password')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
        {{--   update show password     --}}
        <div class="form-group">
            <label for="input_login_password">Password</label>
            <div class="input-group" id="show_hide_password">
                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="input_login_password" placeholder="Enter your password">
                <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash mt-2" aria-hidden="true"></i></a>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            {{-- <a class="small" href="{{ route('reset-password')}}">Forgot Password?</a> --}}
            <button class="btn btn-primary px-4" type="submit">Login</button>
        </div>
    </form>

@endsection

@push('javascript-internal')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
            }
            });
        });
    </script>
@endpush
