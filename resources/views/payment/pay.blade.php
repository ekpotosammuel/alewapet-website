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
        <div class="container">
            <center>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>PAYMENT</h2>
                        </div>
                    </div>
                </div>
            </center>
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
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <form action="{{ route('pay') }}" method="POST">
                        @csrf
                        <input type="hidden" name="fumigation_id" value="{{$fumigations->id}}" />
                        <input type="hidden" name="expires_date" value="{{$fumigations->expires_date }}" />
                        <input type="hidden" name="issue_date" value="{{$fumigations->issue_date }}" />
                        <input type="hidden" name="reg_no" value="reg_no" />
                        <input type="hidden" name="cert_no" value="cert_no" />
                        <input type="hidden" name="reference" value="reference" />

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>NAME OF PREMISES:</strong>
                                <input type="text" name="name_of_premises" class="form-control" value="{{ $fumigations->name_of_premises }}" placeholder="name_of_premises">
                            </div>
                        </div>
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ADDRESS OF PREMISES:</strong>
                                <input type="text" name="address_of_premises" class="form-control" value="{{$fumigations->address_of_premises  }}" placeholder="address_of_premises">
                            </div>
                        </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>DATE OF FUMIGATION:</strong>
                                    <input type="date" name="date_of_fumigation" id='date' class="form-control" value=" " placeholder="y-m-d">
                                    <script>document.getElementById('date').value</script>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>VENDOR NAME:</strong>
                                    <input type="text" name="vendors_use" class="form-control" value="{{ $fumigations->vendors_use }}" placeholder="vendors_use">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>AMOUNT:</strong>
                                    <input type="number" name="amount" class="form-control"  value="amount" placeholder="500000">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 {{-- {!! $vendors->links() !!} --}}


@section('scripts')
    
@endsection




