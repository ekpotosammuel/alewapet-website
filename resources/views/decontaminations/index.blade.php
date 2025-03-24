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

            <form action="" method="GET" role="search"> 
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
    
                                            <input type="search" id="search_keywords" class="form-control" name="search_keywords">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            
                                            <button class="btn btn-outline-primary"> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-success" href="{{url('decontaminations/create') }}"> Create New Decontamination</a>
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
                                            <th>NAME OF PREMISE</th>
                                            <th>ADDRESS OF PREMISE</th>
                                            <th>PHONE NO</th>
                                            <th>DATE OF FUMIGATION</th>
                                            <th>CERTIFICATE NO</th>
                                            <th>ISSUE DATE </th>
                                            <th>EXPIRE DATE</th>
                                            <th>COMMENT</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($decontaminations as $decontamination)
                                           <tr>
                                            <td>{{ $decontamination->name_of_premises }}</td>
                                            <td>{{ $decontamination->address_of_premises }}</td>
                                            <td>{{ $decontamination->phone_no }}</td>
                                            <td>{{ $decontamination->date_of_fumigation }}</td>
                                            <td>{{ $decontamination->cert_no }}</td>
                                            <td>{{ $decontamination->issue_date }}</td>
                                            <td>{{ $decontamination->expires_date}}</td>
                                            <td> 
                                             @if(date('Y-m-d') >= $decontamination->expires_date )

                                                    <a href="#" class="text-danger">
                                                            Demmand Notice 
                                                    </a>
                                                @else
                                                    <span class="text-success">
                                                        Current
                                                    </span>
                                               
                                                @endif
                                           </td>
                                            <td> <a  href="{{ url('decontaminations/edit/'.$decontamination->id) }}">
                                            <i class="fa fa-edit"></i>Edit</a></td>
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

