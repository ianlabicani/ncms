{{-- @extends('adminlte::auth.register') --}}
@extends('adminlte::master')

@section('title', 'Register to NHCC')

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
    </style>
    @yield('css')
@stop

@section('classes_body', 'register-page')

@section('body')
    <div style="background-color: rgb(214, 214, 214); min-height: 100vh; min-width: 100vw;">
        <div class="d-flex align-items-center justify-content-center" style="min-height: 95vh;">
            <div class="card rounded-4 shadow-lg p-5" style="width: 850px;">
                <div class="row py-3">
                    <div class="col-md-6 mt-lg-4">
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
                                    <p class="text-center font-text fs-5" style="font-weight: 500;">"Register to <b
                                            class="text-danger">NHCC"</b>
                                    </p>
                                </div>
                                <hr class="mt-0">
                                <form action="{{ route('register') }}" method="post">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="text" name="name"
                                            class="form-control border border-1 border-secondary @error('name') is-invalid @enderror"
                                            placeholder="Full name" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" name="email"
                                            class="form-control border border-1 border-secondary @error('email') is-invalid @enderror"
                                            placeholder="Email" value="{{ old('email') }}" required>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" name="password"
                                            class="form-control border border-1 border-secondary @error('password') is-invalid @enderror"
                                            placeholder="Password" required>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" name="password_confirmation"
                                            class="form-control border border-1 border-secondary"
                                            placeholder="Retype password" required>

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-block text-light btn-primary fw-bold"">Register</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <p class="mt-3 mb-1">
                                            <a href="{{ route('login') }}" class="text-decoration-none"
                                                style="font-weight: 500;">I
                                                already have an Account</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('adminlte_js')
    @yield('js')
@stop
