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

            {{-- @include('components.topcard') --}}

            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-success" href="{{ url('vendors/create') }}"> Create New Vendor</a>
                        </div>
                        @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                           <p>{{ $message }}</p>
                         </div>
                       @endif
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>COMPANY NAME</th>
                                            <th>ADDRESS</th>
                                            <th>PHONE NUMBER</th>
                                            <th>REGISTRATION NUMBER</th>
                                            <th>AMOUNT PAID</th>
                                            <th>OUTSTANDING</th>
                                            <th>TOTAL</th>
                                            <th>DATE OF PAYMENT</th>
                                            <th>COMMENT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($vendors as $vendor)
                                           <tr>
                                            <td>{{ $vendor->company_name }}</td>
                                            <td>{{ $vendor->address }}</td>
                                            <td>{{ $vendor->phone_no }}</td>
                                            <td>{{ $vendor->registration_no }}</td>
                                            <td>{{ $vendor->amount_paid }}</td>
                                            <td>{{ $vendor->outstanding }}</td>
                                            <td>{{ $vendor->total}}</td>
                                            <td>{{ $vendor->date_of_payment }}</td>
                                            <td>{{ $vendor->comment }}</td>
                                            {{-- <td> <a class="btn btn-primary" href="{{ route('vendors.edit',$vendor->id) }}">Edit</a></td> --}}
                                           </tr>
                                       @endforeach
                                    </tbody>
                                    
                              </table>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
 {{-- {!! $vendors->links() !!} --}}

{{-- scripts --}}
@section('scripts')
    
@endsection