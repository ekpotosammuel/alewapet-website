
 
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
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>                                        
                                            <th>NAME OF PREMISES</th>
                                            <th>ADDRESS OF PREMISES</th>
                                            <th>DEMAND NOTICE</th>
                                            <th>OFFENCE</th>
                                            <th>DELIVER TO</th>
                                            <th>AMOUNT</th>
                                            <th>DATE</th>
                                            <th>TIME</th>
                                            <th>FINAL REMINDER</th>
                                            <th>DUE DATE </th>
                                            <th>STATUS</th>
                                            <th>AMOUNT</th>
                                            <th>NOTIFICATION</th>
                                            <th>Action</th>
                                            <th>MODE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($fumigations as $demand)
                                           <tr>
                                            <td>{{ $demand->name_of_premises }}</td>
                                            <td>{{ $demand->address_of_premises }}</td>
                                            <td><a href="{{url('demands/view')}}?id={{ $demand->id }}" class="text-danger">
                                                Demand Notice
                                            </a></td>
                                            <td>{{ $demand->offence }}</td>
                                            <td>{{ $demand->deliver }}</td>
                                            <td>{{ $demand->amount }}</td>
                                            <td>{{ $demand->date }}</td>
                                            <td>{{ $demand->Time }}</td>
                                            <td>{{ $demand->final}}</td>
                                            <td>{{ $demand->court_sum }}</td>
                                            <td>{{ $demand->status }}</td>
                                            <td>{{ $demand->amount_paid }}</td>
                                            <td>{{ $demand->remark }}</td>
                                            <td>
                                                
                                                @if($demand->final <= $demand->court_sum )

                                                        <a href="#" class="text-danger">
                                                            COURT SUMMOR  
                                                        </a>
                                                    
                                                @else

                                                        <a href="#" class="text-success">
                                                            Current 
                                                        </a> 
                                               
                                                @endif
                                            </td>
                                            <td> <a href="{{ url('demands/edit/'.$demand->id) }}"><i class="fa fa-edit"></i>
                                            Edit</a></td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                              </table>   
                              <div class="row">
                                <div class="col-md-12 pagination">
                                    {{ $fumigations->links('pagination::bootstrap-4') }} 
                                </div>
                            </div>                                                            
                            </div>
                            <div class="row">
                                <div class="col-md-12 pagination">
                                    <a href="{{url('demands/preview')}}?fumigations_ids={{ json_encode($fumigations->pluck('id')) }}" onclick="previewPrintAll()" class="btn btn-primary col-md-12"> <i class="fa fa-print"></i> print all</a>
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
 
