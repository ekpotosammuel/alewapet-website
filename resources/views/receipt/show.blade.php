@extends('layouts.app')

@section('contents')
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')
        <center>
            <div>
                <h1 style="color: green">
                    RECEIPT
                </h1>
                {{--  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NAME OF PREMISES:</strong>
                        <input type="text" name="name_of_premises" class="form-control" value="{{ $subscription->name_of_premises }}" placeholder="name_of_premises">
                    </div>
                </div>
            </div>  --}}
        </center>
    {{--  @csrf  --}}
        @foreach ($receipt as $receipt )
        {{--  {{$receipt->id}}  --}}
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PAYMENT MADE BY:</strong>
                <input type="text" name="user_id" class="form-control"  value={{$receipt->user_id}}>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <strong>PREMISES NAME:</strong>
                <input type="text" name="user_id" class="form-control"  value={{$receipt->fumigation_id}}>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CERT_NO:</strong>
                <input type="text" name="cert_no" class="form-control"  value={{$receipt->cert_no}}>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <strong>AMOUNT:</strong>
                <input type="number" name="amount" class="form-control"  value={{$receipt->amount}}>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ISSUE_DATE:</strong>
                <input type="text" name="issue_date" class="form-control"  value={{$receipt->issue_date}}>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <strong>EXPIRE_DATE:</strong>
                <input type="text" name="expires_date" class="form-control"  value={{$receipt->expires_date}}>
            </div>
        </div>
        @endforeach
        {{--  {{$subscription->user_id}}
        {{$subscription->amount}}
        {{$subscription->expires_date}}  --}}
        {{--  {{$fumigations->expires_date  }}  --}}
@endsection