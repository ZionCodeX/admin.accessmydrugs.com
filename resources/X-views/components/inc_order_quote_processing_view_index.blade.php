
      
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
      <div class="card-header" style="">
        <div class="card-title">
          <h3 class="card-label"><b>GENERATE</b> &nbsp; QUOTE &nbsp; | &nbsp; <small style="color: black;">@php $order_statusx = str_replace('_', ' ', $order_status);  echo Str::upper($order_statusx); @endphp </small>
          <i class="mr-2"></i>
          <small class=""></small></h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
          <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
          <div class="btn-group">
            <!--<button type="button" class="btn btn-primary font-weight-bolder">
            <i class="far fa-save"></i>Save Form</button>
            <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            -->
          </div>
        </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!--CHECK FOR EMPTY RECORDS-->
@if($counts['count_'.$order_status] <= 0)
        <div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
          <div class="alert-icon"><i class="flaticon-warning"></i></div>
          <div class="alert-text">No records available</div>
          <div class="alert-close">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"><i class="ki ki-close"></i></span>
              </button>
          </div>
      </div>
@endif

@foreach ( $orders['load_'.$order_status] as $record )
@if($record->status == $order_status)


<!--DATE CALCULATION STARTS-->
@php
  $diffInDays = \Carbon\Carbon::parse($record->updated_at)->diffInDays();
  $showDiff = \Carbon\Carbon::parse($record->updated_at)->diffForHumans();
  if($diffInDays > 0){
  $showDiff .= ', '.' + '.\Carbon\Carbon::parse($record->created_at)->addDays($diffInDays)->diffInHours().' Hours';
      }
@endphp
<!--DATE CALCULATION STOPS-->


<div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample{{ $loop->iteration }}">
  <div class="card">


    <div class="card-header warning" id="headingOne{{ $loop->iteration }}">
      <div class="card-title" data-toggle="collapse" data-target="#collapseOne{{ $loop->iteration }}">
       <i class="fas fa-file-signature"></i><b>{{ $loop->iteration }} :: </b> &nbsp; {{ $record->order_name }} &nbsp; <small>( <small><b>{{ $showDiff }}</b></small> ) </small>
      </div>
     </div>


   <div id="collapseOne{{ $loop->iteration }}" class="collapse " data-parent="#accordionExample{{ $loop->iteration }}">
    <div class="card-body">
    
      <div class="form-group mb-0">
     



        <h5><b>{{ $record->order_name }}</b><br>
          <small style="color:rgb(150, 150, 150)">Request ID: <b>{{ $record->pid_order }}</b></small></h5>
          <small style="color:rgb(150, 150, 150)">Customer ID: <b>{{ $record->pid_user }}</b></small></h5><hr>
      
     
          
<!--##### XIS STANDARD FORM STARTS #####-->
<form name="request_form{{ $loop->iteration }}" id="request_form{{ $loop->iteration }}" method="post" action="{{ route('admin_action_quote_generated_prox') }}"  enctype="multipart/form-data">
  @csrf   
  
  <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
  <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
  <input type="hidden" name="pid_admin" value="{{ $pid_admin }}" />
      
      <!---------------TABLE STARTS-------------->
      <div class="table-responsive-sm">
        <table class="table table-striped table-bordered zero-configuration">
        
            <thead>  
                <tr style="font-size: 13px;">
                    <th>S/N</th>
                    <th>Product Details</th>
                    <th>Product Image</th>
                    <th>Brand Logo</th>
                    <th>Unit Cost ($)</th>
                    <th>Unit Weight ($/Kg)</th>
                    <th>Updated at</th>
                </tr>
            </thead> 
        
            <tbody>
      

      @php
        $snx = 0;
      @endphp


      <!--////////////// ORDER PRODUCTS LOOP STARTS///////////////-->                 
      @foreach ($products as $product)     
      @if ($product->pid_order == $record->pid_order)
      


      <tr>
        <td>{{ $loop->iteration }}</td>
      
        <td>
            <b><a href="{{ url('product/view/'.$product->pid_product.'/list/index'); }}">{{ $product->product_name }}</a></b><br>
            <b>Quantity: </b> {{ $product->product_quantity.' Units' ?? '' }}<br>
            <b>Info: </b> {{ $product->product_info ?? ' No Info' }}<br>
            <b>Link: </b> {{ $product->product_link ?? ' No Link' }}
        </td>
      
        <td>			
            {{-- IMAGE BOX STARTS --}}
                @if (empty($product->product_image))
                  <div><b>None</b></div>
                @else
                <img class="imgx" src = '{{ URL::asset('https://procurement.spreaditglobal.com/storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp")' height="55px">
                @endif
            {{-- IMAGE BOX ENDS --}}
        </td>
      
        <td>			
            {{-- IMAGE BOX STARTS --}}
                @if (empty($product->brand_image))
                  <div><b>None</b></div>
                @else
                  <img class="imgx" src = '{{ URL::asset('https://procurement.spreaditglobal.com/storage/app/brand_image') }}/{{ $product->brand_image }}?r=@php echo(rand()); @endphp")' height="55px">
                @endif
            {{-- IMAGE BOX ENDS --}}
            <hr>
                @if ($product->brand_with_same_logo == 'YES')
                        <small>This Brand Image will be used for products below</small>
                @endif
        </td>
      

        <style>
          #box {
          border-style: solid;
          border-width: 5px;
          border-color: rgb(15, 139, 221);
        }
        </style>


        <!--FORM ELEMENT SECTION-->

          <!--##### TEXT #####-->
          <input type="hidden" name="@php $snx = $snx + 1; echo 'pid_product'.$snx; @endphp" value="{{ $product->pid_product }}">

          <td>
              <!--##### TEXT #####-->
              @component('form.simple_number')
              @slot('name') P_{{ $product->pid_product }} @endslot
              @slot('id') box @endslot
              @slot('label') @endslot
              @slot('value') {{ $product->product_unit_price ?? '' }} @endslot
              @slot('placeholder') Unit Cost @endslot
              @slot('hint') @endslot
              @slot('maxlength') 20 @endslot
              @slot('required') step=0.0001 required @endslot
              @endcomponent
          </td>


          <td>
            <!--##### TEXT #####--> 
            @component('form.simple_number')
            @slot('name') W_{{ $product->pid_product }} @endslot
            @slot('id') box @endslot
            @slot('label') @endslot
            @slot('value') {{ $product->product_weight ?? '' }} @endslot
            @slot('placeholder') Weight @endslot
            @slot('hint') @endslot
            @slot('maxlength') 20 @endslot
            @slot('required') step=0.0001 required @endslot
            @endcomponent
        </td>
        


          <td>
            {{ $product->updated_at ?? '' }}
          </td>
        <!--EDIT AND DELETE SECTION ENDS-->
      
      </tr>
      
      @endif
      @endforeach    
      <!--////////////// ORDER PRODUCTS LOOP ENDS ///////////////-->   
      
      
      </tbody>
      </table>
      </div>

      <br>
      <!---------------TABLE ENDS-------------->

          @component('form.number')
              @slot('name') order_shipping_rate @endslot
              @slot('id') order_shipping_rate @endslot
              @slot('label') Shipping Rate ($/Kg) @endslot
                @slot('value')
                    @foreach ( $shipping_rates as $shipping_rate)
                        @if (($shipping_rate->country_source_slug == $record->order_procurement_country) && ($shipping_rate->country_source_slug == $record->order_procurement_country))
                            {{ $shipping_rate->shipping_rate_kg }}
                        @endif
                    @endforeach
                @endslot
              @slot('placeholder') @endslot
              @slot('icon') fas fa-donate @endslot
                @slot('hint') 
                    @foreach ( $shipping_rates as $shipping_rate)
                        @if (($shipping_rate->country_source_slug == $record->order_procurement_country) && ($shipping_rate->country_source_slug == $record->order_procurement_country))
                            ({{ $shipping_rate->country_source_name }} - {{ $shipping_rate->country_destination_name }}) :: Shipping Duration: {{ $shipping_rate->shipping_duration }}
                        @endif
                    @endforeach
                @endslot
              @slot('maxlength') 15 @endslot
              @slot('required') required @endslot
          @endcomponent




          <!--##### EXCHANGE RATE #####-->
          @component('form.select')
          @slot('name') order_exchange_rate @endslot
          @slot('id') order_exchange_rate @endslot
          @slot('label') Select Exchange Rate @endslot
          @slot('value')@endslot
          @slot('icon') fas fa-chart-line @endslot
          @slot('hint') Select Exchange Rate @endslot
          @slot('required') required @endslot
              @slot('options')
                    <option value=1 selected>USD-USD :: 1USD to 1USD</option>
                @foreach ( $exchange_rates as $rate)
                    <option value={{ $rate->exchange_rate }}>{{ $rate->exchange_name }} :: {{ number_format($rate->exchange_rate,2) }}{{ $rate->currency2 }} to 1{{ $rate->currency1 }}</option>
                @endforeach
              @endslot
          @endcomponent


          @component('form.number')
              @slot('name') order_vat @endslot
              @slot('id') order_vat @endslot
              @slot('label') VAT Charge Rate (%) @endslot
              @slot('value'){{ $financial_settings->vat }}@endslot
              @slot('placeholder') @endslot
              @slot('icon') fas fa-donate @endslot
              @slot('hint') @endslot
              @slot('maxlength') 20 @endslot
              @slot('required') step=0.0001 required @endslot
          @endcomponent

          @component('form.number')
              @slot('name') order_service_charge @endslot
              @slot('id') order_service_charge @endslot
              @slot('label') Service Charge Rate (%) @endslot
              @slot('value'){{ $financial_settings->service_charge }}@endslot
              @slot('placeholder') Provide Service Charge @endslot
              @slot('icon') fas fa-dolly @endslot
              @slot('hint') @endslot
              @slot('maxlength') 20 @endslot
              @slot('required') step=0.0001 required @endslot
          @endcomponent


          @component('form.number')
              @slot('name') order_additonal_cost @endslot
              @slot('id') order_additonal_cost @endslot
              @slot('label') Additional Cost ($) @endslot
              @slot('value'){{ $record->order_additional_cost ?? 0 }}@endslot
              @slot('placeholder') Provide Additional Cost if any @endslot
              @slot('icon') far fa-money-bill-alt @endslot
              @slot('hint') (Optional) @endslot
              @slot('maxlength') 15 @endslot
              @slot('required') @endslot
          @endcomponent

      
          @component('form.text')
              @slot('name') order_additonal_cost_title @endslot
              @slot('id') order_additonal_cost_title @endslot
              @slot('label') Additional Cost Title @endslot
              @slot('value'){{ $record->order_additional_cost_title ?? '' }}@endslot
              @slot('placeholder') Provide Additional Cost Title here if any @endslot
              @slot('icon') fas fa-tag @endslot
              @slot('hint') (Optional) @endslot
              @slot('maxlength') 200 @endslot
              @slot('required') @endslot
          @endcomponent
        
      
          <!--##### CHECK BOX CUSTOMIZE LOGO #####-->
          @component('form.checkbox')
            @slot('name') confirm_action @endslot
            @slot('id') confirm_action @endslot
            @slot('label') @endslot
            @slot('value')@endslot
            @slot('info') Confirm Action @endslot
            @slot('hint')  @endslot
            @slot('required') required @endslot
          @endcomponent

          <div class="card-footer" style="text-align: center;">

            <div class="row">
              <div class="col-6">
                <!--##### SUBMIT BUTTON #####-->
                @component('form.button')
                    @slot('name') buttonx @endslot
                    @slot('id') generate_quote @endslot
                    @slot('label') Generate Quote @endslot
                    @slot('value') generate_quote @endslot
                    @slot('color') secondary @endslot
                    @slot('icon') fas fa-cogs @endslot
                @endcomponent
              </div>

              <div class="col-6">
                <!--##### SUBMIT BUTTON #####-->
                @component('form.button')
                    @slot('name') buttonx @endslot
                    @slot('id') submit_reject @endslot
                    @slot('label') Reject | Place Request On-Hold @endslot
                    @slot('value') reject @endslot
                    @slot('color') warning @endslot
                    @slot('icon') fas fa-lock @endslot
                @endcomponent
              </div>
            </div>

          </div>


 
    </form>
    <!--##### XIS STANDARD FORM STOPS #####-->     
      
      
      
         <hr>
      







{{--LOAD CHAT MESSAGES START--}}
@foreach ( $load_messages as $record2 )
@if($record2->pid_context == $record->pid_order)

   @if($record2->role == 'ADMIN')
     <div class="d-flex flex-column mb-5 align-items-start">
       <div class="d-flex align-items-center">
         <div class="symbol symbol-circle symbol-35 mr-3">
           <!--<img alt="Pic" src="assets/media/users/300_21.jpg">-->
         </div>
         <div>
           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">ADMIN</a>
           <span class="text-muted font-size-sm">{{ $record2->created_at ?? ""}}</span>
         </div>
       </div>
       <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">{{ $record2->message ?? ""}}</div>
     </div>
   @endif

   @if($record2->role == 'USER')
   <div class="d-flex flex-column mb-5 align-items-end">
     <div class="d-flex align-items-center">
       <div>
         <span class="text-muted font-size-sm">{{ $record2->created_at ?? ""}}</span>
         <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Customer</a>
       </div>
       <div class="symbol symbol-circle symbol-35 ml-3">
         <!--<img alt="Pic" src="assets/media/users/300_21.jpg">-->
       </div>
     </div>
     <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">{{ $record2->message ?? ""}}</div>
   </div>
   @endif

@endif
@endforeach
{{--LOAD CHAT MESSAGES START--}}




         
      </div>
      
    </div>
   </div>
  </div>

 </div>

<hr>
@endif
@endforeach





<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    </div>
   </div>