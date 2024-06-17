@extends('adminlte::page')

@section('title', 'Activity Log')

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

        .colored-toast.swal2-icon-success {
            background-color: #039e43 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #DC3545 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
@stop

@section('content_header')
    <h4 class="fw-semibold color">Activity Log</h4>
@stop

@section('content')
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr class="font-weight-bold">
                    <th>ID</th>
                    <th>Event</th>
                    <th>Subject-ID</th>
                    <th style="width: 30%;">Patient Name</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($data as $log)
                    <tr>
                        <td>{{ $log->id }}</td>
                        <td>
                            @if ($log->event == 'created')
                                Add Patient
                            @else
                                {{ $log->event }}
                            @endif
                        </td>
                        <td>{{ $log->subject_id }}</td>
                        <td>
                            @if (isset($log->properties['attributes']['first_name']) && isset($log->properties['attributes']['last_name']))
                                {{ $log->properties['attributes']['first_name'] }} {{ $log->properties['attributes']['last_name'] }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
