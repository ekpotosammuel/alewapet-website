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
                            <a class="btn btn-success" href="{{url('fumigations/create') }}"> Create New Fumigation</a>
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
                                            <th>NAME OF PREMISES</th>
                                            <th>ADDRESS OF PREMISES</th>
                                            <th>PHONE NUMBER</th>
                                            <th>DATE OF FUMIGATION</th>
                                            <th>VENDOR NAME</th>
                                            <th>CERTIFICATE NO</th>
                                            <th>ISSUE DATE</th>
                                            <th>EXPIRE DATE </th>
                                            <th>COMMENT</th>
                                            <th>Action</th>

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
                                            <td>{{ $fumigation->expires_date }}

                                                <br>
                                            </td>
                                            <td>
                                                
                                                @if(date('Y-m-d') == $fumigation->expires_date )

                                                        <a href="{{url('fumigations/view')}}?id={{ $fumigation->id }}" class="text-danger">
                                                            Demand Notice 
                                                        </a>
                                                    
                                                @else

                                                        <a href="{{-- {{url('fumigations/show', $fumigations->id)}} --}}" class="text-success">
                                                            Current 
                                                        </a>
                                               
                                                @endif
                                            </td>
                                            <td> <a href="{{ url('fumigations/edit/'.$fumigation->id) }}"><i class="fa fa-edit"></i>
                                            Edit</a></td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                              </table> 
                              <div class="row">
                                    <div class="col-md-12 paginate">
                                        {!! $fumigations->links() !!} 
                                    </div>
                                </div> 
                                                                                              
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
 
