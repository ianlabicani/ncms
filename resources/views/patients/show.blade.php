@extends('adminlte::page')

@section('title', 'Dashboard')

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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    {{-- Alert  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Nunito'
        }

        .color {
            color: #039e43;
        }
    </style>
@stop

@section('content_header')
    <h4 class="fw-bolder">Dashboard</h4>
@stop

@section('content')
        <!-- show patient info -->
        <h1>show patient data here</h1>
        <h2>patient name: {{$patient->first_name}}</h2>
        <!-- add styling and display patient information -->


        <!--  -->

        <!-- patient's records table -->
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop