@extends('adminlte::page')

@section('title', 'Patients')

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
    <div class="d-flex justify-content-between mb-3">
        <h4 class="fw-bolder">Patient Records</h4>

    </div>
    <div class="filter-actions-container flex">
        @if (session('successupdate'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    iconColor: 'white',
                    customClass: {
                        popup: 'colored-toast',
                    },
                    showConfirmButton: false,
                    timer: 3000,
                    timerPr0ogressBar: true,
                });
                (async () => {
                    await Toast.fire({
                        icon: 'success',
                        title: 'Patient Information Changed'
                    })
                })()
            </script>
        @endif
    </div>
@stop

@section('content')

    <body>
        <div class="row">
            <div class="col-9">
                <div class="d-flex align-items-center mb-3 gap-2">
                    <form method="GET" action="{{ route('patients.index') }}" class="form-inline">
                        <div class="form-group">
                            <label for="filter_date">Filter by Date:</label>
                            <input type="date" id="filter_date" name="filter_date" class="form-control mx-sm-2">
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    <form method="GET" action="{{ route('patients.index') }}" class="">
                        <input type="hidden" name="filter_date" value="{{ \Carbon\Carbon::today()->toDateString() }}">
                        <button type="submit" class="btn btn-primary">Todays Patients</button>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="d-flex justify-content-between align-items-right mb-3 gap-2">
                    <form method="GET" action="{{ route('patient.excel-record') }}" class="">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-file me-1"></i>Export
                            Excel</button>
                    </form>

                    <form method="GET" action="{{ route('patient.pdf-record') }}" class="">
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-file-pdf me-1"></i>Export
                            Pdf</button>
                    </form>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Registration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Patients List -->
                <div class="row mb-0">
                    <div class="col-9">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-semibold mt-1 color">Patients List</h4>
                        </div>
                    </div>
                    <div class="col-3">
                        <form method="GET" action="{{ route('patients.index') }}" class="d-flex">
                            <div class="form-group d-flex flex-grow-1 me-0">
                                <input type="text" id="lastname" name="search_name" value="{{ old('search_name') }}"
                                    class="form-control me-2" placeholder="Search by Name">
                                <button type="submit" class="btn btn-primary">
                                    <i class='fa-solid fa-magnifying-glass me-2 d-inline'></i>Search
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                @if ($patients->isEmpty())

                    <tr>
                        <td colspan="9">
                            <div class="h1 text-center alert alert-warning">
                                {{ $noRecordsMessage }}
                            </div>
                        </td>
                    </tr>
                    </tr>
                @else
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->first_name }}</td>
                            <td>{{ $patient->last_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('F d, Y') }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->contact_number }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->registration_date)->format('F d, Y') }}</td>
                            <td class="text-center pt-1">
                                <a href="{{ route('patients.edit', $patient) }}" class="btn"><i
                                        class="fa-solid fa-pen-to-square fa-lg text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </body>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
