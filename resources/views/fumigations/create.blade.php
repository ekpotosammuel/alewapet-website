@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

@section('title')
    Home
@endsection


@section('contents')
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       {{--      @include('components.topcard') --}}

        <div class="row">
           <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                <h2>Add New Fumigation List</h2>
              </div>
             <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('fumigations') }}"> Back</a>
            </div>
          </div>
       </div>
   
        @if ($errors->any())
            <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
               <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
               </ul>
            </div>
        @endif
   
<form action="{{ url('fumigations/store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NAME OF PREMISES:</strong>
                <input type="text" name="name_of_premises" class="form-control" placeholder="name_of_premises">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ADDRESS OF PREMISES:</strong>
                <input type="text" name="address_of_premises" class="form-control" placeholder="address_of_premises">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PHONE NUMBER:</strong>
                <input type="text" name="phone_no" class="form-control" placeholder="phone_no">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DATE OF FUMIGATION:</strong>
                <input type="date" name="date_of_fumigation" class="form-control" placeholder="date_of_fumigation">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>VENDOR NAME:</strong>
                <input type="text" name="vendors_use" class="form-control" placeholder="Vendor Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>EHO NUMBER:</strong>
                <input type="text" name="eho_number" class="form-control" placeholder="EHO Number">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CERTIFICATE NO:</strong>
                <input type="text" name="cert_no" class="form-control" placeholder="cert_no">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISSUE DATE:</strong>
                <input type="date" name="issue_date" class="form-control" placeholder="issue_date">
                <!-- <input type="date" name="date_of_fumigation" class="form-control" placeholder="date_of_fumigation"> -->

            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>EXPIRE DATE:</strong>
                <input type="date" name="expires_date" class="form-control" placeholder="expires_date" id="datepicker" >
            </div>
        </div> -->
      {{--   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>COMMENT:</strong>
                 <select class="form-control form-control-sm" name="comment">
                   <option value="DEMAND NOTICE">DEMAND NOTICE</option>
                   <option value="CERTIFICATE">CERTIFICATE</option>
               </select>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
 {{-- {!! $vendors->links() !!} --}}


@section('scripts')
    
@endsection




