{{-- @extends('layouts.app')


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

        <div class="row">
           <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                <h2>EDIT VENDORS</h2>
              </div>
             <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vendors.index') }}"> Back</a>
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
   
<form action="{{ route('vendors.update',$vendor->id) }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PID:</strong>
                <input type="text" name="pid" value="{{$vendor->pid }}" class="form-control" placeholder="pid">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>COMPANY NAME:</strong>
                <input type="text" name="company_name" value="{{$vendor->company_name }}" class="form-control" placeholder="company_name">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ADDRESS:</strong>
                <input type="text" name="address" value="{{$vendor->address }}" class="form-control" placeholder="address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PHONE NUMBER:</strong>
                <input type="text" name="phone_no" value="{{$vendor->phone_no }}" class="form-control" placeholder="phone_no">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>REGISTRATION NUMBER:</strong>
                <input type="text" name="registration_no" value="{{$vendor->registration_no }}" class="form-control" placeholder="registration_no">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>AMOUNT PAID:</strong>
                <input type="text" name="amount_paid" value="{{$vendor->amount_paid }}" class="form-control" placeholder="amount_paid">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>OUTSTANDING:</strong>
                <input type="text" name="outstanding" value="{{$vendor->outstanding }}"class="form-control" placeholder="outstanding">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DATE OF PAYMENT:</strong>
                <input type="text" name="date_of_payment" value="{{$vendor->date_of_payment }}" class="form-control" placeholder="date_of_payment">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>COMMENT:</strong>
                <input type="text" name="comment" value="{{$vendor->comment }}" class="form-control" placeholder="comment">
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
 {!! $vendors->links() !!} --}}

{{-- scripts --}}
{{-- @section('scripts')
    
@endsection --}}