@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Profile</h4>
                        <a href="{{ route('profile.edit', ['user' => $user->id]) }}" class="btn btn-primary">Edit Profile</a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
