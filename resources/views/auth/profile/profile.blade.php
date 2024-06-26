@extends('adminlte::page')

@section('title', 'Profile')

@section('css')
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ url('Css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('Css/fontawesome.min.css') }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ url('Image/logo.png') }}" type="image/x-icon">
    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- Alert  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Nunito'
        }

        .font {
            font-family: 'Poppins';
        }

        .color {
            color: #039e43;
        }
    </style>
@stop

@section('content_header')
    <h5 class="fw-semibold font">Profile</h5>
    <hr class="mt-0">
@stop

@section('content')

    <body>
        <div class="container-fluid mt-2">
            <div class="row p-0">
                <div class="col-6">
                    <h6><b>Name:</b> {{ $user->name }}</h6>
                </div>
                <div class="col-6">
                    <h6><b>Email:</b> {{ $user->email }}</h6>
                </div>
            </div>
            <hr class="mt-0">
            <div class="row mt-4">
                <div class="col-6">
                    <h6><b>Joined:</b> {{ $user->created_at->format('M d, Y') }}</h6>
                </div>
                <div class="col-6">
                    <h6><b>Last Updated:</b> {{ $user->updated_at->format('M d, Y') }}</h6>
                </div>
            </div>
            <hr class="mt-0">
            <a href="{{ route('profile.edit', ['user' => $user->id]) }}" class="btn btn-primary"><i
                    class="fa-solid fa-pen-to-square ms-1"></i> Edit
                Profile</a>
        </div>
    </body>
    {{-- <body>
        <div class="container-fluid">
            <div class="row justify-content-start">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header py-0 bg-success">
                            <h4 class="py-0 mt-1 pb-0">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <p>{{ $user->name }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="joined">Joined:</label>
                                        <p>{{ $user->created_at->format('M d, Y') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_updated">Last Updated:</label>
                                        <p>{{ $user->updated_at->format('M d, Y') }}</p>
                                    </div>

                                    <a href="{{ route('profile.edit', ['user' => $user->id]) }}"
                                        class="btn btn-primary">Edit
                                        Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body> --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
