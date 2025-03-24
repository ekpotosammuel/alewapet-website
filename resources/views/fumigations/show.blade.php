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
                            
                        </div>
                        <div class="card-body">
                            <div class="print-wrapper">
                                <div class="row">
                                    <div class="col-12"> <p align="center" style="margin-top:10px;">{{ $fumigations->cert_no }} </p>
                                        <h1 class="text-success" style="text-align: center; margin-top:10px; padding: 20px">  <img src=" {{ asset('/img/Coat.svg.png') }}" align="center" height="100px">ABUJA MUNICIPAL AREA COUNCIL<img src=" {{ asset('/img/amac2.png') }}" align="center" height="100px"></h1>
                                        <p class="text-primary"style="text-align: center; margin-bottom:5px;"><b>AREA 10, GARKI ABUJA F.CT P.M.B 64, ABUJA NIGERIA <br>ENVIRONMENTAL SERVICES DEPARTMENT<br>
                                        Tel: 09031408041, 08096773456, 08035874982 </p>

                                        <h1 class="text-danger" style="text-align: center;font-family:book antiqua;font-size: 60px; font-style: italic; margin-top:10px; "><b>Certificate of Fumigation</b></h1>
                                                     
                                    </div>                                         
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border" style="color:#000 !important;border: 1px solid #000 !important;">
                                            <table class="table" style="color:#000 !important;">

                                                <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td style="font-family:sans-serif"><b>NAME OF PREMISES : </b> </td>
                                                    <td style="color:blue;"><b>{{ $fumigations->name_of_premises }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b>ADDRESS OF PREMISES:</b>  </td>
                                                    <td style="color:blue;"><b>{{ $fumigations->address_of_premises }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b>TYPE OF PREMISES :</b></td>
                                                    <td style="color:blue;"><b>1002</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b> DATE OF NOTICE :</b></td>
                                                    <td style="color:blue;"><b>{{ date('Y-m-d') }}</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important;">
                                          <b>
                                     <pre>
                                                            {{ $fumigations->name_of_premises }}
         I certify that the premises belonging to...........................................................................................<br>
        .............................................................................................................................<br>
                                              {{ $fumigations->address_of_premises }}
        Situtated at No:.......................................................................................Has been <br>
                                              {{ date('Y-m-d') }}
        disinfected/fumigated by me on ......................................... it is my considered opinion<br>
            
         that the building(s)treated within the said primises is/are rid of pests,vectors and rodents of public health<br>
        important in accordance with Pursuant to the provision of section 7 and 4th schedule to the constitution of the <br>
        Federal Republic of Nigeria 1999.No 20 part 1-5 of AMAC Pest Control Management and Certification bye-law 2012.<br>
                                                     {{ $fumigations->vendors_use }}
        Name of Pest control professional................................................................................<br>
                EHO|10550                                                                       2022|2023|0150
        Reg No..................... Signature of EHO................ Professional Licence No.........................<br>
        
        Issued this...{{ date('d') }}.......... Day of......{{ date('m') }}....{{ date('Y') }}.....20...........dated of Next 

        Fumigation...................... 
                                     </pre>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                                                        

                                        <div class="row">
                                            <div class="col-5" style="color:#000 !important;">
                                                <br/>
                                                    {{-- <p><img src="/img/htr.png"></p> <br /> --}}
                                                   
                                                    <br/><br/><br/><br/>
                                                    
                                                     .....................................................................................
                                                    <p style="margin-left:60px;">Managing Director</p> <p style="margin-bottom:200px;">
                                                    PEST CONTROL MANAGEMENT UNIT AMAC</p>
                                                
                                                                                                    
                                            </div>

                                            <div class="col-2 offset" style="color:#000 !important;">
                                                <br/><br/><br/><br/><br/>
                                                    <p><img src="/img/redseal.jpg" width="100px" height="80px"></p> 
                                                   
                                            </div>

                                            <div class="col-5 offset " style="color:#000 !important;">
                                                <br/>
                                                    {{-- <p><img src="/img/htr.png"></p> <br /> --}}
                                                    
                                                    <br/><br/><br/><br/>
                                                   ............................................................................
                                                    <p> 
                                                        <br>
                                                    DIRECTOR PH /HOD ENVIRONMENT
                                                     </p>
                                                   
                                            </div>
                                        </div>
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




