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
                <h2>Add Demand Notice</h2>
              </div>
             <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('demands') }}"> Back</a>
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
   
<form action="{{ url('demands/store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DD NO:</strong>
                <input type="text" name="dd_no" class="form-control" placeholder="dd_no">
            </div>
        </div>
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
                <strong>OFFENCE:</strong>
                 <select class="form-control form-control-sm" name="offence">
                   <option value="NONE"> NONE </option>
                   <option value="1 NO EVDIENCE"> 1. NO EVDIENCE</option>
                   <option value="2 OBSTRUCTION OF EHO"> 2 OBSTRUCTION OF EHO</option>
                   <option value="3 USE OF UNACCREDITED VENDOR"> 3 USE OF UNACCREDITED VENDOR</option>
                   <option value="4 ALL OF THE ABOVE"> 4 ALL OF THE ABOVE</option>
               </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DELIVER TO:</strong>
                <input type="text" name="deliver" class="form-control" placeholder="deliver">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>AMOUNT:</strong>
                <input type="text" name="amount" class="form-control" placeholder="amount">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISSUE DATE:</strong>
                <input type="DATE" name="date" class="form-control" placeholder="date" id="datepicker">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TIME:</strong>
                <input type="TIME" name="time" class="form-control" placeholder="time">
            </div>
        </div>
        
        
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




