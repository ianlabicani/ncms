{{-- @extends('adminlte::auth.passwords.email') --}}
@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ url('Image/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    @yield('css')
@stop

@section('classes_body', 'login-page')

@section('body')
    <div class="d-flex align-items-center justify-content-center mb-4" style="min-height: 90vh;">
        <div class="login-box zoom-out" style="width: 30rem;">
            <a href="/" class="login-logo d-flex align-items-center justify-content-center text-decoration-none mb-3">
                {{-- <img src="{{ url('Image/logo.png') }}" height="60" alt="Mendoza Logo" /><br> --}}
                <span style="font-weight: 900;">
                    <b class="text-danger ms-2">NORTHERN HEALTHCARE <br> CHILDREN CLINIC</b>
                </span>
            </a>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg fw-bold" style="font-weight: 300;">Reset Password</p>

                    <form action="{{ route('password.email') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    {{-- <span class="fas fa-envelope"></span> --}}
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-2">
                            <!-- /.col -->
                            <div class="col">
                                <div class="d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-block text-light btn-primary fw-bold"> Email Reset
                                        Password</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="mb-1">
                                <a href="{{ route('login') }}" class="text-center text-decoration-none"
                                    style="font-weight: 500;">I already
                                    have an Account
                                </a>
                            </p>
                            <p class="mb-0">
                                <a href="{{ route('register') }}" class="text-center text-decoration-none"
                                    style="font-weight: 500;">Register
                                    a New Account</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    {{-- <div class="copyright zoom-out" style="color:#030101;">
        &copy; Copyright <strong><span class="text-danger">NORTHERN HEALTHCARE CHILDREN CLINIC</span></strong>. All Rights
        Reserved
    </div> --}}
@endsection

@section('adminlte_js')
    @yield('js')
@stop
