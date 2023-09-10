

@php 
//LOAD ORDERS CALCULATION CONTROLLER
$calcx = array();
$calcx = App\Http\Controllers\OrdersCalculationController::calc($record->pid_order);

//SERIAL NUMBER COUNT
$snx = 1;
@endphp




<div class="card card-custom gutter-b">
<div class="card-body p-0">
    
    
<!--INVOICE BANNER STARTS -->
    <div class="card card-custom position-relative overflow-hidden">
        <!--begin::Shape-->
        <div class="position-absolute opacity-30">
            <span class="svg-icon svg-icon-10x svg-logo-white">
                <!--begin::Svg Icon | path:assets/media/svg/shapes/abstract-8.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" width="176" height="165" viewBox="0 0 176 165" fill="none">
                    <g clip-path="url(#AD84FF)">
                        <path d="M-10.001 135.168C-10.001 151.643 3.87924 165.001 20.9985 165.001C38.1196 165.001 51.998 151.643 51.998 135.168C51.998 118.691 38.1196 105.335 20.9985 105.335C3.87924 105.335 -10.001 118.691 -10.001 135.168Z" fill="#AD84FF"></path>
                        <path d="M28.749 64.3117C28.749 78.7296 40.8927 90.4163 55.8745 90.4163C70.8563 90.4163 83 78.7296 83 64.3117C83 49.8954 70.8563 38.207 55.8745 38.207C40.8927 38.207 28.749 49.8954 28.749 64.3117Z" fill="#AD84FF"></path>
                        <path d="M82.9996 120.249C82.9996 144.964 103.819 165 129.501 165C155.181 165 176 144.964 176 120.249C176 95.5342 155.181 75.5 129.501 75.5C103.819 75.5 82.9996 95.5342 82.9996 120.249Z" fill="#AD84FF"></path>
                        <path d="M98.4976 23.2928C98.4976 43.8887 115.848 60.5856 137.249 60.5856C158.65 60.5856 176 43.8887 176 23.2928C176 2.69692 158.65 -14 137.249 -14C115.848 -14 98.4976 2.69692 98.4976 23.2928Z" fill="#AD84FF"></path>
                        <path d="M-10.0011 8.37466C-10.0011 20.7322 0.409554 30.7493 13.2503 30.7493C26.0911 30.7493 36.5 20.7322 36.5 8.37466C36.5 -3.98287 26.0911 -14 13.2503 -14C0.409554 -14 -10.0011 -3.98287 -10.0011 8.37466Z" fill="#AD84FF"></path>
                        <path d="M-2.24881 82.9565C-2.24881 87.0757 1.22081 90.4147 5.50108 90.4147C9.78135 90.4147 13.251 87.0757 13.251 82.9565C13.251 78.839 9.78135 75.5 5.50108 75.5C1.22081 75.5 -2.24881 78.839 -2.24881 82.9565Z" fill="#AD84FF"></path>
                        <path d="M55.8744 12.1044C55.8744 18.2841 61.0788 23.2926 67.5001 23.2926C73.9196 23.2926 79.124 18.2841 79.124 12.1044C79.124 5.92653 73.9196 0.917969 67.5001 0.917969C61.0788 0.917969 55.8744 5.92653 55.8744 12.1044Z" fill="#AD84FF"></path>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <!--end::Shape-->
    
    
        <!--begin::Invoice header-->
        <div class="row justify-content-center py-5 px-5 py-md-10 px-md-0 bg-primary">
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                    <div class="d-flex flex-column px-0 order-2 order-md-1">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5 max-w-115px">
                            <span class="svg-icon svg-icon-full svg-logo-white">
                                <!--begin::Svg Icon | path:assets/media/svg/logos/duolingo.svg-->
                                      <img
                                        alt="Logo"
                                        height="65px"
                                        src="{{ url ('assets/media/logos/spreadit-logo3.png'); }}"
                                        />
                                <!--end::Svg Icon-->
                            </span>
                        </a>
                        <!--end::Logo-->
                        <span class="d-flex flex-column font-size-h5 font-weight-bold text-white">
                            <span>No.5 Olutosin Ajayi street, by CPM Headquaters,</span>
                            <span>Ajao Estate Lagos, Nigeria.</span>
                        </span>
                    </div>
                    <h1 class="display-3 font-weight-boldest text-white order-1 order-md-2">INVOICE</h1>
                </div>
            </div>
        </div>
        <!--end::Invoice header-->
    </div>
<!--INVOICE BANNER STARTS -->

    
    <!-- begin: Invoice header-->
    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">


        



        <div class="col-md-10">

            <div class="border-bottom w-100">Order Name: <b>{{ $record->order_name }}</b> | ID: <b>{{ $record->pid_order }}</b></div>

            <div class="d-flex justify-content-between pt-6">
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">ORDER DATE</span>
                    <span class="opacity-70">{{ (\Carbon\Carbon::create($record->updated_at))->toFormattedDateString(); }}</span><br>
                    <span class="font-weight-bolder mb-2">DUE DATE</span>
                    <span class="opacity-70">{{ (\Carbon\Carbon::create($record->updated_at))->addDays(7)->toFormattedDateString(); }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2">ORDER NO.</span>
                    <span class="opacity-70">{{ 'INV-0000'.$record->id }}</span>
                </div>
                <div class="d-flex flex-column flex-root">
                    <span class="font-weight-bolder mb-2"><b>DELIVERED TO</b></span>
                    <span class="opacity-70">
                        <b>{{ $calcx['customer_full_name'] ?? '' }}</b>,<br> 
                        {{ $calcx['destination_address'] ?? '' }}
                    </span>
                </div>
            </div>


        </div>
    </div>
    <!-- end: Invoice header-->


    <!-- begin: Invoice body-->
    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
        <div class="col-md-10">


<!---------- TABLE STARTS ----------->                
            <div class="table-responsive">
                <table class="table">

                    <thead>
                        <tr>
                            <th class="pl-0 font-weight-bold text-muted text-uppercase">S/n</th>
                            <th class="pl-0 font-weight-bold text-muted text-uppercase">Ordered Items</th>
                            <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                            <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price ($)</th>
                            <th class="text-right font-weight-bold text-muted text-uppercase">Unit Measure ({{ $calcx['measurement_type'] }})</th>
                            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount ($)</th>
                        </tr>
                    </thead>

                    <tbody>



<!--////////////// ORDER PRODUCTS LOOP STARTS///////////////-->                 
@foreach ($products as $product)   
    @if ($product->pid_order == $record->pid_order )
        
                <tr class="font-weight-boldest">
                    <td>{{ $snx }}</td>
                    <td class="border-0 pl-0 pt-7 d-flexx align-items-center">
                        {{ $product->product_name }}<br>
                        <small>{{ $product->product_info ?? '' }}</small><br>
                        <small><a href="{{ $product->product_link ?? '' }}" target="_blank"> {{ $product->product_link ?? '' }}</a></small><br>
                    </td>
                    <td class="text-right pt-7 align-middle">{{ $product->product_quantity }}</td>
                    <td class="text-right pt-7 align-middle">{{ $product->product_unit_price }}</td>
                    <td class="text-right pt-7 align-middle">{{ number_format($product->product_weight,4) }}</td>
                    <td class="text-primary pr-0 pt-7 text-right align-middle">{{ number_format(($product->product_unit_price * $product->product_quantity),2) }}</td>
                </tr>
                @php  $snx++;  @endphp
    @endif
@endforeach    
<!--////////////// ORDER PRODUCTS LOOP ENDS///////////////--> 


                    </tbody>
<!---------- TABLE ENDS ----------->

                </table>
            </div>

            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th class="font-weight-bold text-mutedx text-uppercase text-right"><small><b>Total Product Cost</b></small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="font-weight-bolder">
                            <td class="text-secondary font-size-h4 font-weight-boldest text-right">
                              {{  '$'.number_format($calcx['total_cost'], 2); }}
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>



        </div>
    </div>
    <!-- end: Invoice body-->
    <!-- begin: Invoice footer-->
    <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
        <div class="col-md-10">
            <div class="table-responsive">

                <table class="table">

                    <thead>
                        <tr>
                            <th class="font-weight-bold text-mutedx text-uppercase text-left"><small><b>Charges Rates</b></small></th>
                        </tr>
                    </thead>

                    <tr class="font-weight-bolder">
                        <td class="text-secondary-lightx font-size-h7 font-weight-bold text-left" style="color: rgb(128, 128, 128);">
                          <span style="color: rgb(155, 155, 155);">VAT</span> : &nbsp; <b>{{ number_format($calcx['vat_rate'], 2); }}%</b><br>

                          <span style="color: rgb(155, 155, 155);">Service Charge Rate</span> : &nbsp; <b>{{ number_format($calcx['service_charge_rate'], 2); }}%</b><br>

                          <span style="color: rgb(155, 155, 155);">Shipping Rate</span> : &nbsp; <b>${{ number_format($calcx['shipping_rate'], 2); }}/{{ $calcx['measurement_type'] }}</b><br>

                        </td>
                    </tr>



                    <thead>
                        <tr>
                            <th class="font-weight-bold text-mutedx text-uppercase text-left"><small><b>Shipping Details</b></small></th>
                        </tr>
                    </thead>

                    <tr class="font-weight-bolder">
                        <td class="text-secondary-lightx font-size-h7 font-weight-bold text-left" style="color: rgb(128, 128, 128);">

                          <span style="color: rgb(155, 155, 155);">Shipping Plan</span> : &nbsp; <b>{{ $calcx['shipping_plan'] }}</b><br>

                          <span style="color: rgb(155, 155, 155);">Shipping Duration</span> : &nbsp; <b>{{ $calcx['shipping_duration'] ?? 'Not Specified' }}</b><br>

                          <span style="color: rgb(155, 155, 155);">Shipping Info</span> : &nbsp; <b>{{ $calcx['shipping_info'] ?? 'No Additional Information' }}</b><br>

                          <span style="color: rgb(155, 155, 155);">Measurement Type</span> : &nbsp; <b>$/{{ $calcx['measurement_type'] }}</b><br>

                          <span style="color: rgb(155, 155, 155);">Total Weight</span> : &nbsp; <b>{{ $calcx['total_weight'] }}{{ $calcx['measurement_type'] }}</b><br>

                          <span style="color: rgb(155, 155, 155);">Source Country</span> : &nbsp; <b>{{ $calcx['source_country'] }}</b><br>

                          <span style="color: rgb(155, 155, 155);">Destination Country</span> : &nbsp; <b>{{ $calcx['destination_country'] }} </b><br>
                        </td>
                    </tr>


                    <tr class="font-weight-bolder">
                        <td class="text-secondary font-size-h5 font-weight-bold text-left">
                          VAT Cost: &nbsp; <b>{{  '$'.number_format($calcx['vat_cost'], 2); }}</b>
                        </td>
                    </tr>

                    <tr class="font-weight-bolder">
                        <td class="text-secondary font-size-h5 font-weight-bold text-left">
                          Shipping Cost: &nbsp; <b>{{  '$'.number_format($calcx['shipping_cost'], 2); }}</b>
                        </td>
                    </tr>

                    <tr class="font-weight-bolder">
                        <td class="text-secondary font-size-h5 font-weight-bold text-left">
                          Service Charge Cost: &nbsp; <b>{{  '$'.number_format($calcx['service_charge_cost'], 2); }}</b>
                        </td>
                    </tr>

                    @if ( $calcx['additional_cost'] == 0)
                        <!--do or show nothing-->
                    @else
                        <tr class="font-weight-bolder">
                            <td class="text-secondary font-size-h5 font-weight-bold text-left">
                            
                                @if ( ($calcx['additional_cost_title'] == '') || ($calcx['additional_cost_title'] == null) || !trim($calcx['additional_cost_title'])  )
                                    Additional Cost: 
                                @else
                                    {{ $calcx['additional_cost_title'].':' ?? 'Additional Cost: ' }}
                                @endif

                                    &nbsp; <b>{{  '$'.number_format($calcx['additional_cost'], 2); }}</b>
                            
                            </td>
                        </tr>


                        






                        <tr class="font-weight-bolder"><td></td></tr>

                        <tr class="font-weight-bolder">
                            <td class="text-secondary font-size-h5 font-weight-bold text-left">
                        <!--begin::Invoice footer-->
                            <small>
                                <div class="d-flex flex-column flex-md-row">
                                    <div class="d-flex flex-column">
                                        <div class="font-weight-bold font-size-h6 mb-3"><b>BANK TRANSFER DETAILS</b></div>
                                        <div class="d-flex justify-content-between font-size-lg mb-3">
                                            <span class="font-weight-bold mr-15">Bank: </span>
                                            <span class="text-right">Guaranty Trust Bank Ltd.</span>
                                        </div>
                                        <div class="d-flex justify-content-between font-size-lg mb-3">
                                            <span class="font-weight-bold mr-15">Account Name: </span>
                                            <span class="text-right">SPREADIT LIMITED</span>
                                        </div>
                                        <div class="d-flex justify-content-between font-size-lg mb-3">
                                            <span class="font-weight-bold mr-15">Account Number:</span>
                                            <span class="text-right">0449334095</span>
                                        </div>
                                        <div class="d-flex justify-content-between font-size-lg mb-3">
                                            <span class="font-weight-bold mr-15">Swift Code:</span>
                                            <span class="text-right">GTBINGLA</span>
                                        </div>
                                        <div class="d-flex justify-content-between font-size-lg">
                                            <span class="font-weight-bold mr-15">Routing Number:</span>
                                            <span class="text-right">058-152609</span>
                                        </div>
                                    </div>
                                </div>
                            </small>
                        <!--end::Invoice footer-->
                    </td>
                </tr>



                        <tr class="font-weight-bolder"><td></td></tr>


                        @if ( $calcx['alternate_currency_code'] == 'KES')
                            <tr class="font-weight-bolder">
                                <td class="text-secondary font-size-h5 font-weight-bold text-left">
                            <!--begin::Invoice footer-->
                                    <small>
                                    <div class="d-flex flex-column flex-md-row">
                                        <div class="d-flex flex-column">
                                            <div class="font-weight-bold font-size-h6 mb-3"><b>BANK TRANSFER DETAILS (For Kenya )</b></div>
                                            <div class="d-flex justify-content-between font-size-lg mb-3">
                                                <span class="font-weight-bold mr-15">Bank Name: </span>
                                                <span class="text-right">I&M</span>
                                            </div>
                                            <div class="d-flex justify-content-between font-size-lg mb-3">
                                                <span class="font-weight-bold mr-15">Bank Branch: </span>
                                                <span class="text-right">VALLEY ARCADE</span>
                                            </div>
                                            <div class="d-flex justify-content-between font-size-lg mb-3">
                                                <span class="font-weight-bold mr-15">Account Name: </span>
                                                <span class="text-right">SPREADIT LIMITED</span>
                                            </div>
                                            <div class="d-flex justify-content-between font-size-lg mb-3">
                                                <span class="font-weight-bold mr-15">Account Number:</span>
                                                <span class="text-right">01603392381850</span>
                                            </div>
                                            <div class="d-flex justify-content-between font-size-lg mb-3">
                                                <span class="font-weight-bold mr-15">Swift Code:</span>
                                                <span class="text-right">57</span>
                                            </div>
                                            <div class="d-flex justify-content-between font-size-lg mb-3">
                                                <span class="font-weight-bold mr-15">Branch Code:</span>
                                                <span class="text-right">016</span>
                                            </div>
                                        </div>
                                    </div>
                                </small>
                    
                            <!--end::Invoice footer-->
                        </td>
                    </tr>
                    @endif





                        
                    @endif
                    
                </table>
                




                <table class="table">
                    <thead>
                        <tr>
                            <th class="font-weight-bold text-muted text-uppercase text-right"><b>TOTAL PAYABLE</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="font-weight-bolder">
                            <td class="text-primary font-size-h1 font-weight-boldest text-right">
                              {{  '$'.number_format($calcx['estimated_landing_cost'], 2); }}
                            </td>
                        </tr>

                        @if ( $calcx['alternate_currency_code'] != 'USD')
                            <tr class="font-weight-bolder">
                                <td class="text-secondary font-size-h4 font-weight-boldest text-right">
                                <b style="color: gray;">{{ $calcx['alternate_currency_code'] }}</b> {{  number_format(($calcx['estimated_landing_cost'] * $calcx['alternate_currency_rate']) , 2); }}<br>
                                <small class="font-size-sm">Taxes included</small>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                



            </div>
        </div>
    </div>
    <!-- end: Invoice footer-->
    <!-- begin: Invoice action-->


    @if ($order_status == 'order_invoice_pending')  
    <hr>
        <div class="col-md-12">
            <form method="post" action="{{ route('admin_action_order_processing_prox') }}"  enctype="multipart/form-data">
                @csrf

                <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Please ensure that users have made actual <b>Bank Payments</b> before approving their payment.</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                </div>

                <hr>

                <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
                <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
                <input type="hidden" name="order_name" value="{{ $record->order_name }}" />

                <input type="checkbox" name="check" value="" required>&nbsp; Confirm your action <br><br>

                <button type="submit" name="buttonx" value="order_processing" class="btn btn-primary font-weight-bolder ml-sm-auto my-1" ><i class="far fa-file-powerpoint"></i> Approve Bank Payment</button> &nbsp;
                
            </form>
        </div>
    @endif



       
    @if ($order_status == 'order_invoice_expired')  
    <hr>
        <div class="col-md-4">
            <form method="post" action="{{ route('admin_action_review_expired_invoice_prox') }}"  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
                <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
                <input type="hidden" name="order_name" value="{{ $record->order_name }}" />

                <input type="checkbox" name="check" value="" required>&nbsp; Confirm your action <br><br>

                <button type="submit" name="buttonx" value="review_invoice" class="btn btn-secondary font-weight-bolder ml-sm-auto my-1" ><i class="far fa-file-excel"></i> Review Expired Invoice</button> &nbsp;
                
            </form>
        </div>
    @endif




    @if ($order_status == 'order_invoice_expired')  
    <hr>
        <div class="col-md-4">
            <form method="post" action="{{ route('admin_action_review_expired_invoice_prox') }}"  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
                <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
                <input type="hidden" name="order_name" value="{{ $record->order_name }}" />

                <input type="checkbox" name="check" value="" required>&nbsp; Confirm your action <br><br>

                <button type="submit" name="buttonx" value="review_invoice" class="btn btn-secondary font-weight-bolder ml-sm-auto my-1" ><i class="far fa-file-excel"></i> Review Expired Invoice</button> &nbsp;
                
            </form>
        </div>
    @endif  


  

    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
        <div class="col-md-10">
            <div class="d-flex justify-content-between">
    
                <!--<button type="button" class="btn btn-primary font-weight-bolder py-4 mr-3 mr-sm-14 my-1" onclick="window.print();">Print Invoice</button>
                <button type="button" class="btn btn-light-primary font-weight-bolder mr-3 my-1">Download</button>-->

    <!-- end: Invoice action-->
            </div>
        </div>
    </div>
    <!-- end: Invoice action-->
    <!-- end: Invoice-->
</div>
</div>