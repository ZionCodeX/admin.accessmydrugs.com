
      
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">
          <div class="card-title">
            <h3 class="card-label"><b>ORDERS</b> &nbsp; | &nbsp; <small style="color: black;">@php $order_statusx = str_replace('_', ' ', $order_status);  echo Str::upper($order_statusx); @endphp </small>
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
@if($counts <= 0)
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










@foreach ( $orders as $record )
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
       


    
<h5><b>Customer Details</b><br><hr>
    <small style="color:rgb(150, 150, 150)">Full Name: <b>{{ $record->first_name }} {{ $record->last_name }}</b></small></h5>
    <small style="color:rgb(150, 150, 150)">Order ID: <b>{{ $record->pid_order }}</b></small></h5><br>
    <small style="color:rgb(150, 150, 150)">Customer ID: <b>{{ $record->pid_user }}</b></small></h5><br>
    <small style="color:rgb(150, 150, 150)">Email: <b>{{ $record->email }}</b></small></h5><br>
    <small style="color:rgb(150, 150, 150)">Phone: <b>{{ $record->phone ?? 'Not Provided' }}</b></small></h5><br>
    <small style="color:rgb(150, 150, 150)">Delivery Address: <b>{{ $record->apartment }}, {{ $record->street }}, {{ $record->state }}, {{ $record->country }}.</b></small></h5><hr><br>




<!---------------TABLE STARTS-------------->
<div class="table-responsive-sm">
  <table class="table table-striped table-bordered zero-configuration">
  
      <thead>  
          <tr style="font-size: 13px;">
              <th>S/N</th>
              <th>Product Details</th>
              <th>Product Image</th>
              <th>Date of Purchase</th>
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
      <b>Qty Purchased: </b> {{ $product->product_quantity.' Units' ?? '' }}<br>
      <b>Qty in Stock: </b> {{ $product->quantity ?? ' No Info' }}<br>
      <b>Category: </b> {{ $product->product_category ?? ' No Info' }}
  </td>

  <td>			
      {{-- IMAGE BOX STARTS --}}
          @if (empty($product->product_image))
          <img class="imgx" src = '{{ URL::asset('https://admin3.spreaditglobal.com/storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp' height="55px">
          @else
          <img class="imgx" src = '{{ URL::asset('https://admin3.spreaditglobal.com/storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp' height="55px">
          @endif
      {{-- IMAGE BOX ENDS --}}
  </td>



  <!--EDIT AND DELETE SECTION-->
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

<!---------------TABLE ENDS-------------->




   <hr>


   <h3> <small style="color:rgb(150, 150, 150)">Total Cost of Order: <b>₦{{ number_format(($record->order_total_cost/100), 2) }}</b></small></h3>






<hr>




            <!--##### XIS STANDARD FORM STARTS #####-->
            <form name="request_form{{ $loop->iteration }}" id="request_form{{ $loop->iteration }}" method="post" action="{{ route('order_switch_message') }}"  enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="pid_order" value="{{ $record->pid_order }}" />
              <input type="hidden" name="first_name" value="{{ $record->first_name }}" />
              <input type="hidden" name="email" value="{{ $record->email }}" />
              <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
              <input type="hidden" name="pid_admin" value="{{ $pid_admin }}" />
              <input type="hidden" name="status" value="{{ $record->status }}" />


            <!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
            @component('form.textarea')
                @slot('name') message @endslot
                @slot('id') editor @endslot
                @slot('label') Admin Information (Optional) @endslot
                @slot('value')@endslot
                @slot('placeholder') Please provide any additional information with regards this order or your action. This is Optional. @endslot
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
              @slot('value') @endslot
              @slot('info') Confirm Action @endslot
              @slot('hint')  @endslot
              @slot('required') required @endslot
            @endcomponent

            <div class="card-footer" style="text-align: center;">

              <div class="row">
                  
                  
                  
               @if($record->status == "attempted")
                <div class="col-8">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') sendmessage  @endslot
                      @slot('label') Send a Message to the Customer @endslot
                      @slot('value') sendmessage @endslot
                      @slot('color') dark @endslot
                      @slot('icon') fas fa-forward @endslot
                  @endcomponent
                </div>
                @endif    
                  
                  
                  
                @if($record->status == "processing")
                <div class="col-8">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') processing  @endslot
                      @slot('label') Swtich Order | Move to IN-TRANSIT @endslot
                      @slot('value') processing @endslot
                      @slot('color') primary @endslot
                      @slot('icon') fas fa-forward @endslot
                  @endcomponent
                </div>
                @endif
                
                
                
               @if($record->status == "in_transit")
                <div class="col-8">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') in_transit  @endslot
                      @slot('label') Swtich Order | Move to ARRIVED @endslot
                      @slot('value') in_transit @endslot
                      @slot('color') warning @endslot
                      @slot('icon') fas fa-forward @endslot
                  @endcomponent
                </div>
                @endif
                
                
                
                @if($record->status == "arrived")
                <div class="col-8">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') arrived  @endslot
                      @slot('label') Swtich Order | Move to DELIVERED @endslot
                      @slot('value') arrived @endslot
                      @slot('color') success @endslot
                      @slot('icon') fas fa-forward @endslot
                  @endcomponent
                </div>
                @endif
                
                
                
                @if($record->status != "cancelled")
                <div class="col-4">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') cancel @endslot
                      @slot('label') Cancel Order @endslot
                      @slot('value') cancel @endslot
                      @slot('color') secondary @endslot
                      @slot('icon') fas fa-trash @endslot
                  @endcomponent
                </div>
                @endif
                
                
              </div>

            </div>

          </form>
          <!--##### XIS STANDARD FORM STOPS #####-->




           
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