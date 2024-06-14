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
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
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

        .font {
            font-family: 'Poppins';
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
    <h5 class="fw-semibold font">Patient List</h5>
    <hr class="mt-0">
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
            <div class="col-8">
                <div class="d-flex align-items-center gap-2">
                    <form method="GET" action="{{ route('patients.index') }}" class="form-inline">
                        <div class="form-group">
                            <label for="filter_date">Filter by Date:</label>
                            <input type="date" id="filter_date" name="filter_date" class="form-control mx-sm-2">
                        </div>
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass me-1"></i>Filter</button>
                    </form>
                    <form method="GET" action="{{ route('patients.index') }}" class="">
                        <input type="hidden" name="filter_date" value="{{ \Carbon\Carbon::today()->toDateString() }}">
                        <button type="submit" class="btn btn-primary">
                            <span class="d-sm-inline d-md-none">Today</span>
                            <span class="d-none d-md-inline">Today's Patients</span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <form method="GET" action="{{ route('patient.excel-record') }}" class="">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-file me-1 d-sm-inline d-md-none"></i>
                            <span class="d-none d-md-inline"><i class="fa-solid fa-file me-1"></i>Export Excel</span>
                        </button>
                    </form>

                    <form method="GET" action="{{ route('patient.pdf-record') }}" class="">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-file-pdf me-1 d-sm-inline d-md-none"></i>
                            <span class="d-none d-md-inline"><i class="fa-solid fa-file-pdf me-1"></i>Export PDF</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Registration Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Patients List -->
                <div class="row mb-0">
                    <div class="col-9">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <h4 class="fw-semibold mt-1 color">Patients List</h4> --}}
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
                @else
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->first_name }}</td>
                            <td>{{ $patient->last_name }}</td>
                            <td>{{ $patient->age_with_months }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->date_of_birth)->format('F d, Y') }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ \Carbon\Carbon::parse($patient->registration_date)->format('F d, Y') }}</td>
                            <td class="text-center pt-1">
                                <a href="{{ route('patients.edit', $patient) }}" class="btn"><i
                                        class="fa-solid fa-pen-to-square fa-lg text-primary"></i></a>
                                <a href="{{ route('patients.show', $patient) }}" type="button" class="btn"><i
                                        class="fa-solid fa-eye fa-lg text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div>
            {{ $patients->links('pagination::bootstrap-5') }}
        </div>
    </body>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
