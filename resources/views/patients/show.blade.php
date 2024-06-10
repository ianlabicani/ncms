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
    <h4 class="fw-bolder">Show Patient Data</h4>
@stop

@section('content')
    @php
        use Carbon\Carbon;
    @endphp

    <body>
        <div class="row">
            <div class="col-3">
                <h6 class="d-inline "><strong>Name:</strong> {{ $patient->first_name }}
                    {{ $patient->last_name }} </h6>
            </div>
            <div class="col-3">
                <h6 class="d-inline"><strong>Sex:</strong> {{ $patient->gender }} </h6>
            </div>
            <div class="col-3">
                <h6 class="d-inline"><strong>Address:</strong> {{ $patient->address }} </h6>
            </div>
        </div>
        <hr class="mt-0">

        <div class="row pt-2">
            <div class="col-3">
                <h6 class="d-inline "><strong>Contact Number:</strong> {{ $patient->contact_number }}</h6>
            </div>
            <div class="col-3">
                <h6 class="d-inline"><strong>Email:</strong> {{ $patient->email }} </h6>
            </div>
            <div class="col-3">
                <h6 class="d-inline"><strong>Date of Birth:</strong>
                    {{ Carbon::parse($patient->date_of_birth)->format('F j, Y') }} </h6>
            </div>
            <div class="col-3">
                <h6 class="d-inline"><strong>Registration Date:</strong>
                    {{ Carbon::parse($patient->registration_date)->format('F j, Y') }} </h6>
            </div>
        </div>
        <hr class="mt-0">

        <!-- add styling and display patient information -->


        <!--  -->

        <form action="{{ route('patient-visit.store') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $patient->id }}">
            <div class="row pt-2">
                <div class="col-4">


                    <div class="mb-3">
                        <label for="visit_date" class="form-label">Visit Date <small class="text-muted">(Visiting today?
                                Leave blank)</small></label>
                        <input type="date" class="form-control" id="visit_date" name="visit_date">
                    </div>
                </div>
                <div class="col-6">

                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose <small class="text-muted">(Purpose of going
                                clinic)</small></label>
                        <input type="text" class="form-control" id="purpose" name="purpose" required>
                    </div>
                </div>
                <div class="col-2 pt-2">
                    <button type="submit" class="btn btn-primary mb-2 mt-4">Add Record</button>
                </div>
            </div>
        </form>
        {{-- <hr class="mt-0"> --}}
        <div class="pt-2">
            <div style="height: 300px; overflow-y: auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Visit Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patient->patientVisits as $record)
                            <tr>
                                <td> {{ Carbon::parse($record->visit_date)->format('F j, Y') }}</td>
                                <td>{{ $record->purpose }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No records found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </body>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
