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
                                            <input type="search" id="search_keywords" class="form-control" name="search_keywords" placeholder="search for Cert_No">
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
                                           
                                            {{--  <th>NAME OF PREMISES</th>  --}}
                                            {{--  <th>ADDRESS OF PREMISES</th>  --}}
                                            <th>CERTIFICATE NO</th>
                                            <th>AMOUNT</th>
                                            <th>Action</th>
                                            
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                
                                        @foreach ($receipt as $receipt)
                                           <tr>
                                                <td>{{ $receipt->cert_no }}</td>
                                                <td>{{ $receipt->amount }}</td>

                                                    <br>
                                                </td>
                
                                                <td> 
                                                    <a href="#"><i class="text-success"></i>Print</a>
                                                </td>
                                            </tr>
                                            
                                                
                                                {{-- @if(date('Y-m-d') == $fumigation->expires_date )

                                                        <a href="{{url('demands/view')}}?id={{ $fumigation->id }}" class="text-danger">
                                                            Demand Notice 
                                                        </a>
                                                    
                                                @else --}}

                                                        {{--  <a href="{{url('fumigations/view')}}?id={{ $fumigation->id }}" class="text-success">
                                                            Current 
                                                        </a>  --}}
                                               
                                                {{-- @endif --}}
                                    
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


