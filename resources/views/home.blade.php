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

            @include('components.topcard')

            
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection