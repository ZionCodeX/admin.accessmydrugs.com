

@php 
    //LOAD ORDERS CALCULATION CONTROLLER
    $calcx = array();
    $calcx = App\Http\Controllers\OrdersCalculationController::calc($record->pid_order);

    //SERIAL NUMBER COUNT
    $snx = 1;
@endphp


<div class="card card-custom gutter-b">
    <div class="card-body p-0">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
        <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
            <div class="col-md-10">


                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                    <h1 class="display-4 font-weight-boldest mb-10">QUOTE</h1>
                    <div class="d-flex flex-column align-items-md-end px-0">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5">
                            <img src="assets/media/logos/spreadit-logo2.png" height="100px" alt="">
                        </a>
                        <!--end::Logo-->
                        <span class="d-flex flex-column align-items-md-end opacity-70">
                            <span><b>Spreadit Limited</b></span>
                            <span>No.5 Olutosin Ajayi Street by CPM Head Quarters,<br>
                                Ajao Estate, Lagos.</span>
                        </span>
                    </div>
                </div>


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
                                    <b style="color: gray;">{{ $calcx['alternate_currency_code'] }}</b> {{  number_format(($calcx['estimated_landing_cost'] * $calcx['alternate_currency_rate']) , 2); }}
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>



                </div>
            </div>
        </div>

        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-10">
                <div class="d-flex justify-content-between">

                    <!--##### XIS STANDARD FORM #####-->
                    <form method="post" action="{{ route('admin_action_request_processing_prox') }}"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
                        <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
                        <input type="hidden" name="pid_admin" value="{{ $pid_admin }}" />

                    <button type="submit" class="btn btn-light-primary font-weight-bold" name="buttonx" value="review_quote">Review Quote</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- end: Invoice footer-->
        <!-- begin: Invoice action-->
        <!--
            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">

            <div class="col-md-10">
                <div class="d-flexx justify-content-betweenx">
                    <div class="form-group">
                        <textarea class="form-control form-control-lg form-control-solid" id="exampleTextarea" rows="3" placeholder="Reasons for Rejection / Approval (Optional)"></textarea>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-10">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Reject</button>
                    <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Approve Quote</button>
                </div>
            </div>
        </div>
        -->
        <!-- end: Invoice action-->
        <!-- end: Invoice-->
    </div>
</div>