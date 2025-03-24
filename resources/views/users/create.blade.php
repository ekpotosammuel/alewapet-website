@extends('layouts.app')


@section('title')
Home
@endsection


@section('contents')
<!-- Main Content -->
<div id="content">

    @include('components.navigation')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <style>
            .uper {
                margin-top: 40px;
            }
        </style>
        <div class="card uper">
            <div class="card-header">
                Create User Table
            </div>
            <div class="card-header">
                <a class="btn btn-primary" href="{{ url('users') }}"> Back</a>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ url('users/store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">User Name:</label>
                    <input type="text" class="form-control" name="name" />
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" />
                </div>

                <div class="form-group">
                    <label for="role_id">Select District:</label>
                    <select class="form-control" name="role_id">
                        <option value="">-- Select Role --</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" />
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirm_password" />
                </div>

                <button type="submit" class="btn btn-primary">Add Data</button>
            </form>

        </div>
    </div>
    <!-- End of Main Content -->
    @endsection

    {{-- scripts --}}
    @section('scripts')

    @endsection