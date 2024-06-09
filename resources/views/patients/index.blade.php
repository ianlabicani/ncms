
@extends('adminlte::page')

@section('title', 'Patients')

@section('content_header')
    <h1>Patients</h1>
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
                    <!-- add  route('patients.edit', $patient->id) -->
                    <a href="" class="btn btn-primary">Edit</a>
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
