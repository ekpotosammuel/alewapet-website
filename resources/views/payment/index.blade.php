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
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-body">





                            <form action="" method="GET" role="search"> 
                                <div class="row">
                                     <div class="col-md-5 offset-3">
                                        <div class="form-group">
                                            {{-- <label for="search_keywords">Search</label> --}}
                                            <input type="search" id="search_keywords" class="form-control" name="search_keywords" placeholder="Search By Cert. No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 offset-5">
                                        <div class="form-group">
                                            {{-- <label for="search_keywords">Search</label> --}}
                                            <button class="btn btn-outline-primary"> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <br /><hr />
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" id="office_table" cellspacing="0">
                                    <thead>
                                        <tr>
                                           
                                            <th>NAME OF PREMISES</th>
                                            <th>ADDRESS OF PREMISES</th>
                                            <th>PHONE NUMBER</th>
                                            <th>DATE OF FUMIGATION</th>
                                            <th>VENDOR NAME</th>
                                            <th>CERTIFICATE NO</th>
                                            <th>ISSUE DATE</th>
                                            <th>EXPIRE DATE </th>
                                            <th>Make Payment</th>
                                            {{--  <th>Action</th>  --}}
                                            
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                
                                        @foreach ($fumigations as $fumigation)
                                           <tr>
                                            <td>{{ $fumigation->name_of_premises }}</td>
                                            <td>{{ $fumigation->address_of_premises }}</td>
                                            <td>{{ $fumigation->phone_no }}</td>
                                            <td>{{ $fumigation->date_of_fumigation }}</td>
                                            <td>{{ $fumigation->vendors_use }}</td>
                                            <td>{{ $fumigation->cert_no }}</td>
                                            <td>{{ $fumigation->issue_date}}</td>
                                            <td class="text-danger">{{ $fumigation->expires_date }}

                                                <br>
                                            </td>
                                            <td>                                               
                                                <a href="{{ url('payments/show-form') }}?fumigation_id={{ $fumigation->id }}" class="text-success">
                                                    payment 
                                                </a>
                                            </td>

                                       @endforeach

                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12 pagination">
                                        {{ $fumigations->links('pagination::bootstrap-4') }} 
                                    </div>
                                </div>
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


