
@extends('adminlte::page')

@section('title', 'Patients')

@section('content_header')
    <h1>Patients</h1>
    <div class="filter-actions-container flex">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <form method="GET" action="{{ route('patients.index') }}" class="form-inline mb-2">
            <div class="form-group">
                <label for="filter_date">Filter by Date:</label>
                <input type="date" id="filter_date" name="filter_date" class="form-control mx-sm-2">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <form method="GET" action="{{ route('patients.index') }}" class="form-inline">
            <input type="hidden" name="filter_date" value="{{ \Carbon\Carbon::today()->toDateString() }}">
            <button type="submit" class="btn btn-secondary">Todays Patients</button>
        </form>
    </div>
@stop

@section('content')
    <table class="table">
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
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->first_name }}</td>
                <td>{{ $patient->last_name }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->gender }}</td>
                <td>{{ $patient->contact_number }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->registration_date }}</td>
                <td class="pt-1">
                    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script> -->
@stop
