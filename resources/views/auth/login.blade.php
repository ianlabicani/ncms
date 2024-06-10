{{-- resources/views/auth/custom_login.blade.php --}}
@extends('adminlte::master')

@section('title', 'Login')

@section('adminlte_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
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
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg fw-bold" style="font-weight: 300;">Sign in to get access</p>

                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    {{-- <span class="fas fa-envelope text-primary"></span> --}}
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    {{-- <span class="fas fa-lock text-primary"></span> --}}
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-2">
                            <div class="col-7">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" style="font-weight: 500;">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <p class="mb-1">
                                    <a href="{{ route('password.request') }}" class="text-danger text-decoration-none"
                                        style="font-weight: 500;">I forgot my password</a>
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary text-light fw-bold"
                                    style="font-weight: 700;">Login</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="mb-0">
                                <a href="{{ route('register') }}" class="text-center text-decoration-none"
                                    style="font-weight: 500;">Register a
                                    New Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="copyright zoom-out" style="color:#030101;">
        &copy; Copyright <strong><span class="text-danger">NORTHERN HEALTHCARE CHILDREN CLINIC</span></strong>. All Rights
        Reserved
    </div> --}}
@stop

@section('adminlte_js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
