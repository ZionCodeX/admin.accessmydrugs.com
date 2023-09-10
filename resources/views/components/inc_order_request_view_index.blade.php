
      
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">
          <div class="card-title">
            <h3 class="card-label"><b>QUOTE</b> &nbsp; REQUEST &nbsp; | &nbsp; <small style="color: black;">@php $order_statusx = str_replace('_', ' ', $order_status);  echo Str::upper($order_statusx); @endphp </small>
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
         <i class="fas fa-file-signature"></i><b>{{ $loop->iteration }} :: </b> &nbsp; {{ $record->order_name ?? "" }} &nbsp; <small><i class="fas fa-clock"></i>( <small><b>{{ $showDiff }}</b></small> ) </small>
        </div>
       </div>


     <div id="collapseOne{{ $loop->iteration }}" class="collapse " data-parent="#accordionExample{{ $loop->iteration }}">
      <div class="card-body">
      
        <div class="form-group mb-0">
       

  <h5><b>{{ $record->order_name }}</b><br>
    <small style="color:rgb(150, 150, 150)">Request ID: <b>{{ $record->pid_order }}</b></small></h5>
    <small style="color:rgb(150, 150, 150)">Customer ID: <b>{{ $record->pid_user }}</b></small></h5><hr>
    <small style="color:rgb(150, 150, 150)">Procurement Country: <b>{{ Str::upper($record->order_procurement_country) }}</b></small></h5><br>
    <small style="color:rgb(150, 150, 150)">Destination Country: <b>{{ Str::upper($record->order_destination_country) }}</b></small></h5><hr>



<!---------------TABLE STARTS-------------->
<div class="table-responsive-sm">
  <table class="table table-striped table-bordered zero-configuration">
  
      <thead>  
          <tr style="font-size: 13px;">
              <th>S/N</th>
              <th>Product Details</th>
              <th>Product Image</th>
              <th>Brand Logo</th>
          </tr>
      </thead> 
  
      <tbody>


<!--////////////// ORDER PRODUCTS LOOP STARTS///////////////-->    
@php $same_logo = 'FALSE'; @endphp                
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
          <img class="imgx" src = '{{ URL::asset('https://procurement.spreaditglobal.com/storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp")' height="55px">
          @else
          <img class="imgx" src = '{{ URL::asset('https://procurement.spreaditglobal.com/storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp")' height="55px">
          @endif
      {{-- IMAGE BOX ENDS --}}
  </td>

  <td>	
      @if ($same_logo == 'FALSE')			
      {{-- IMAGE BOX STARTS --}}
          @if (empty($product->brand_image))
          <img class="imgx" src = '{{ URL::asset('https://procurement.spreaditglobal.com/storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp")' height="35px">
          @else
          <img class="imgx" src = '{{ URL::asset('https://procurement.spreaditglobal.com/storage/app/brand_image') }}/{{ $product->brand_image }}?r=@php echo(rand()); @endphp")' height="55px">
          @endif
      {{-- IMAGE BOX ENDS --}}
      @endif
                    

      @if ($same_logo == 'TRUE')	
          <small><b><center>Same Logo as above</center></b></small>
      @endif

     
          @if ($product->brand_with_same_logo == 'YES')
              <hr>
              <small>This Brand Image will be used for products below</small>
          @endif

          @php if($product->brand_with_same_logo == 'YES'){ $same_logo = 'TRUE';} @endphp
  </td>

  <!--EDIT AND DELETE SECTION-->
    <td>
        {{ $product->date_updated ?? '' }}
    </td>
  <!--EDIT AND DELETE SECTION ENDS-->

</tr>

@endif
@endforeach    
<!--////////////// ORDER PRODUCTS LOOP ENDS ///////////////-->   


</tbody>
</table>
</div>
<!---------------TABLE ENDS-------------->




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






  {{--SHOW FOR REQUEST PENDING--}}
    @if($order_status == 'order_request_pending')
         

            <!--##### XIS STANDARD FORM STARTS #####-->
            <form name="request_form{{ $loop->iteration }}" id="request_form{{ $loop->iteration }}" method="post" action="{{ route('admin_action_request_pending_prox') }}"  enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
              <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
              <input type="hidden" name="pid_admin" value="{{ $pid_admin }}" />

              <hr>
            <!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
            @component('form.textarea')
                @slot('name') message @endslot
                @slot('id') editor @endslot
                @slot('label') Admin Information (Optional) @endslot
                @slot('value')@endslot
                @slot('placeholder') Please provide any additional information with regards to your action below. This is Optional @endslot
                @slot('hint') Optional Information @endslot
                @slot('maxlength') 600 @endslot
                @slot('rows') 4 @endslot
                @slot('required') @endslot
            @endcomponent


            <!--##### FILE UPLOAD #####-->
    


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
                      @slot('id') submit_lock @endslot
                      @slot('label') Lock Request | Start Processing @endslot
                      @slot('value') lock @endslot
                      @slot('color') secondary @endslot
                      @slot('icon') fas fa-lock @endslot
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
  @endif







  {{--SHOW FOR REQUEST PROCESSING--}}
  @if($order_status == 'order_request_processing')


  <!--##### XIS STANDARD FORM STARTS #####-->
  <form name="request_form{{ $loop->iteration }}" id="request_form{{ $loop->iteration }}" method="post" action="{{ route('admin_action_request_processing_prox') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
    <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
    <input type="hidden" name="pid_admin" value="{{ $pid_admin }}" />

<hr>
 
<!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
@component('form.textarea')
      @slot('name') message @endslot
      @slot('id') editor @endslot
      @slot('label') Admin Information (Optional) @endslot
      @slot('value')@endslot
      @slot('placeholder') Please provide any additional information with regards to your action below. This is Optional @endslot
      @slot('hint') Optional Information @endslot
      @slot('maxlength') 600 @endslot
      @slot('rows') 4 @endslot
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
            @slot('id') submit_lock @endslot
            @slot('label') Create a Quote @endslot
            @slot('value') create_quote @endslot
            @slot('color') secondary @endslot
            @slot('icon') fas fa-box @endslot
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
@endif




           
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