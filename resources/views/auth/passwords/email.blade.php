{{-- @extends('adminlte::auth.passwords.email') --}}
@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ url('Image/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }

        .font {
            font-family: 'Poppins';
            font-size: 3rem;
        }

        .font-text {
            font-family: 'Poppins';
        }

        .text-shadow {
            text-shadow: 3px 3px 5px rgba(63, 63, 63, 0.6);
        }

        .login-logo .font {
            font-weight: 900;
            letter-spacing: 2px;
            font-size: clamp(2.6rem, 2.5vw, 2.6rem);
            /* Responsive font size */
        }
    </style>
    @yield('css')
@stop

@section('classes_body', 'login-page')
@section('body')
    <div style="background-color: rgb(214, 214, 214); min-height: 100vh; min-width: 100vw;">
        <div class="d-flex align-items-center justify-content-center" style="min-height: 95vh;">
            <div class="card rounded-4 shadow-lg p-5" style="width: 850px;">
                <div class="row py-3">
                    <div class="col-md-6 pt-4">
                        <a href="#"
                            class="login-logo d-flex align-items-start justify-content-start text-decoration-none mb-3">
                            {{-- <img src="{{ url('Image/logo.png') }}" height="60" alt="Mendoza Logo" /><br> --}}
                            <span class="text-start" style="font-weight: 900; letter-spacing: 2px;">
                                <b class="text-danger text-shadow font">NORTHERN</b><br>
                                <b class="text-danger text-shadow font">HEALTHCARE</b><br>
                                <b class="text-danger text-shadow font">CHILDREN'S</b><br>
                                <b class="text-danger text-shadow font">CLINIC</b><br>
                            </span>
                        </a>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="">
                            <div class="">
                                <div class="rounded-1 py-0">
                                    <p class="text-center font-text fs-5" style="font-weight: 500;">"Welcome to <b
                                            class="text-danger">NHCC"</b>
                                    </p>
                                </div>
                                <hr class="mt-0">
                                <form action="{{ route('password.email') }}" method="post">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                            value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="d-flex justify-content-center ">
                                                <button type="submit" class="btn btn-block text-light btn-primary fw-bold">
                                                    Email Reset
                                                    Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="mb-2">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-center" style="color:#030101;">
            &copy; Copyright <strong> <span class="text-danger ms-1">NORTHERN HEALTHCARE CHILDREN CLINIC</span></strong>.
            All
            Rights
            Reserved
        </div> --}}
    </div>
@stop

@section('adminlte_js')
    @yield('js')
@stop
