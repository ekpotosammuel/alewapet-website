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
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        <div class="card-body">
                            <div class="print-wrapper" >
                                @foreach ($fumigations as $value)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                 <p><img src="/img/Coat.svg.png" style="height: 150px;"></p>
                                                {{-- <img src=" {{ asset('/img/Coat.svg.png') }}" align="center" style="height: 100px;" > --}}
                                            </div>
                                        </div>
                                        <h1 class="text-success" style="text-align: center; font-size: 80px; font-family: tahoma;">ABUJA MUNICIPAL AREA COUNCIL</h1>
                                        <h2 class="text-danger"style="text-align: center; font-size: 50px;">ENVIRONMENTAL SERVICE DEPARTMENT</h2>
                                        <p class="text-primary"style="text-align: center; font-family: tahoma; font-size:17;"><b>ANNEX OFFICE:</b> Suite 306, 3rd Floor Kano House Ralph Shodeinde street Behind Ministry of finance C.B.D <br>
                                        Tel: 09085191698, 08096773456, 08035874982 </p>
                                                     
                                    </div>                                      
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <h1 class="text" style="text-align: center; color:red !important; font-family: tahoma; font-size:40px; ">DEMAND NOTICES</h1>
                                        <div class="row-border" style="color:#000 !important;border: 3px solid #000 !important;">
                                            <table class="table" style="color:#000 !important;">

                                                <tr style="border-bottom-style: 3px solid #000 !important;">
                                                    <td style="font-family:tahoma; font-size:18px;"><b>NAME OF PREMISES : </b> </td>
                                                    <td style="font-family:tahoma; font-size:18px; color: blue;"><b>{{ $value->name_of_premises}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:18px;"><b>ADDRESS OF PREMISES:</b>  </td>
                                                    <td style="font-family:tahoma; font-size:18px; color: blue;"><b>{{ $value->address_of_premises }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b>TYPE OF PREMISES :</b></td>
                                                    <td style="font-family:tahoma; font-size:18px; color: blue;"><b>1002</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:18px;"><b> DATE OF NOTICE :</b></td>
                                                    <td style="font-family:tahoma; font-size:18px; color: blue;"><b>{{ date('Y-m-d') }}</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:5px;">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 3px solid #000 !important;">
                                            <strong style="font-family:tahoma; font-size:23px;">THE MANAGEMENT OF ABUJA MUNICIPAL AREA COUNCIL, (Environmental Services Department),</strong>
                                          <b style="font-family:tahoma; font-size:18px;">
                                         Fumigation/Pest Contol Unit wishes to notify you in accordance with the provision of section 4,5,6.and 7 of Abuja Municipal Area Council Pest Control by-Law (2012) and others Relevance law of Environmental Health Offences 2012 That you are rquested to pay a Charge of...................................................................................................................................................................................................................................................................................................................................................
                                         ...................................................................................................
                                            </b>
                                            <b style="font-family:tahoma; font-size:18px;">
                                             as an offence under this bye-law 1_Provision of Section 5<input type="checkbox" name="checkbox"> 2_Provision of Section 7<input type="checkbox" name="checkbox"> 3_Provision of Section 6<input type="checkbox" name="checkbox"> Please note that the charges should be paid to AMAC revenue account on remita platform The Identification code for this revenue is 053 Fumigation and Landscaping.
                                            </b>

                                            <hr>
                                            <b style="font-family:tahoma; font-size:16px;">
                                                You are to make necessary payment within 14 days of this notice and present evidence of Payment to the Above Annex office and obtain official receipt.

                                            </b>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important;border: 3px solid #000 !important;">
                                            <b class="text-danger"style="font-family:tahoma; font-size:22px;">NOTE</b>: <b style="font-family:tahoma; font-size:18px;">Payment to any location other than the prescribed account shall be treated as invalid. Your early response will be highły appreciated
                                            </b>
                                        </div>
                                    </div>
                                </div>


                                  <div class="row">
                                    <div class="col-md-12" style="margin-top:5px;">
                                        <div class="row-border" style="color:#000 !important;border: 3px solid #000 !important;">
                                            <table class="table" style="color:#000 !important;">

                                                <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td style="font-family:tahoma; font-size:16px;"><b>NAME OF DESPATCH : </b> </td>
                                                    <td style="color:blue;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:16px;"><b>NAME OF OFFICER:</b>  </td>
                                                    <td style="color:blue;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:16px;"><b>MODE OF COLLECTION :</b></td>
                                                    <td style="color:blue;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:16px;"><b> NAME OF RECEIVER :</b></td>
                                                    <td style="color:blue;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:18px;"><b> OFFENCE:</b></td>
                                                    <td style="font-size: 10; color:blue;"><p style="font-family:tahoma; font-size:20px;">1.NO EVIDENCE OF FUMIGATION <input type="checkbox" name="checkbox"> 2. OBSTRUCTION OF EHO <input type="checkbox" name="checkbox"> 3. USE OF UNACCREDITED VENDOR<input type="checkbox" name="checkbox"> 4. ENVIRONMENTAL OFFENCE<input type="checkbox" name="checkbox"></p></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:tahoma; font-size:18px;"><b> QUARTER:</b></td>
                                                    <td style="color:blue;"><p style="font-family:tahoma; font-size:20px;">1ST<input type="checkbox" name="checkbox"> 2ND <input type="checkbox" name="checkbox"> 3RD<input type="checkbox" name="checkbox"> 4TH<input type="checkbox" name="checkbox"></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                        <div class="row">
                                            <div class="col-6" style="color:#000 !important;">
                                                    <p><img src="/img/opreation.png" height="150px"; style="margin-top:5px;"></p>
                                                    <p style="font-family:tahoma; font-size:18px; margin-bottom:50px;">SIGNED FOR <br>
                                                    HEAD OF OPERATION AMAC <br>
                                                    ENVIRONMENTAL SERVICES DEPARTMENT
                                                     </p>
                                                   
                                            </div>
                                        </div>
                                        <p style="page-break-before: always">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-outline-primary btn-sm col-md-12" onclick="printDiv()">
                                        <i class="fa fa-print"></i> Print or <i class="fa fa-file-pdf"></i> Download PDF
                                    </button>
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
 
 @section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
    <script src="{{asset('js/print.min.js')}}"></script>
    <script type="text/javascript">
        function printDiv() {
            $(".print-wrapper").printElement({
                leaveOpen:true,
                printMode:'popup',
                printBodyOptions:{
                    styleToAdd:'1px solid #000 !important;',
                    classNameToAdd : 'row-border'
                }
            });

        }

    </script>
    
@endsection




