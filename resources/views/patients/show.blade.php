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

        <form action="{{ route('patient-visit.store') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{$patient->id}}">
            <div class="mb-3">
                <label for="visit_date" class="form-label">Visit Date</label>
                <input type="date" class="form-control" id="visit_date" name="visit_date" required>
            </div>
            <div class="mb-3">
                <label for="purpose" class="form-label">Purpose</label>
                <input type="text" class="form-control" id="purpose" name="purpose" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>

        <!-- patient's records table -->
        <table class="table" border="1px">
            <thead>
                <tr>
                    <th>Visit Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patient->patientVisits as $record)
                <tr>
                    <td>{{ $record->visit_date }}</td>
                    <td>{{ $record->purpose }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-center">No records found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
