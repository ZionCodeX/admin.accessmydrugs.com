
@extends('layouts.base')


@section('title', 'Order :: View Products')


@section('header_links')
    @parent
@endsection


@section('alert_messages')
    @parent
@endsection


@section('sidebar')
    @parent
@endsection

 
<!-- MAIN PAGE CONTENT STARTS -->
@section('content')
    <!---------------------------------------------------------->

    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
        <div class="alert-icon">
          <span class="svg-icon svg-icon-primary svg-icon-xl">
            <!--begin::Svg Icon -->
              <span class="svg-icon menu-icon"><i class="fa fa-clipboard"></i></span>
            <!--end::Svg Icon-->
          </span>
        </div>
        <div class="alert-text">Dashboard | <small class="secondary"> No information available at this time</small></div>
      </div>

    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">

          <div class="card-title">
            <h3 class="card-label">View / Edit Products for Quote
            <i class="mr-2"></i>
            <small class=""> Add / Edit Products to Cutomer's Quote</small></h3>
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

<h5><b>{{ $order->order_name }}</b><br><small style="color:rgb(150, 150, 150)">Order ID: <b>{{ $order->pid_order }}</b></small></h5><br>
<hr>

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('order_admin_add_product_index') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="pid_order" value="{{ $order->pid_order }}" />
    <input type="hidden" name="pid_user" value="{{ $order->pid_user }}" />
    <input type="hidden" name="pid_admin" value="{{ $order->pid_admin }}" />
  

<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Add Product @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-box @endslot
@endcomponent

</form>






<div class="table-responsive-sm">
<table class="table table-striped table-bordered zero-configuration">

    <thead>  
        <tr style="font-size: 13px;">
            <th>S/N</th>
            <th>Product Name</th>
            <th>Unit Price ($)</th>
            <th>Quantity</th>
            <th>Unit Weight (Kg)</th>
            <th>Total Price ($)</th>
            <th>Edit | Delete</th>
        </tr>
    </thead> 



    <tbody>
        
         
<!--////////////// ORDER PRODUCTS LOOP STARTS///////////////-->                 
@foreach ($product as $record)     

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <b><a href="" target="_blank">{{ $record->product_name }}</a></b>
                <br><b>Info:</b> {{ $record->product_info }}
            </td>
            <td>{{ number_format($record->product_price,2) }}</td>
            <td>{{ number_format($record->product_quantity) }}</td>
            <td>{{ number_format($record->product_weight,4) }}</td>
            <td>{{ number_format(($record->product_price * $record->product_quantity),2) }}</td>
		

            <!--EDIT AND DELETE SECTION-->
            <td>
                <center>
                    <ul class="list-inline mb-0">
                        <li><a href="https://dashboard.spreaditglobal.com/ps/home/procurement-and-shipping-edit-products/PSD-469KV-1630416938/PSP-23MGX-1630423317"><i class="ft-edit" style="color:green;"></i></a></li>&nbsp;&nbsp; |&nbsp;&nbsp;

                    <li>
                        <i class="ft-x-circle" style="color:red; data-action=" close"="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" "=""></i>

                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);">

                            <a class="dropdown-item"><b style="color:green;">Cancel</b></a>

                            <div class="dropdown-divider"></div>
                            <a href="https://dashboard.spreaditglobal.com/ps/delete-products/PSD-469KV-1630416938/PSP-23MGX-1630423317" class="dropdown-item"><b style="color:orange;">Delete Product</b></a>
                        </div>
                    </li>
                    </ul>
                </center>
            </td>
            <!--EDIT AND DELETE SECTION ENDS-->
        </tr>
@endforeach    
<!--////////////// ORDER PRODUCTS LOOP ENDS///////////////--> 								



    </tbody>
    
    <tfoot>
     <!--<tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>-->
    </tfoot>

</table>
</div><!--RESPONSIVE TABLE ENDS-->

<hr>
<p>Rates</p>
<h6>Vat: <b>{{ $calc['vat_rate'] }}%</b></h6>
<h6>Service Charge: <b>{{ $calc['service_charge_rate'] }}%</b></h6>
<h6>Shipping Rate: <b>{{ $calc['shipping_rate'] }}%</b></h6>
<hr>
<h6>Total Weight of Order: <b>${{ $calc['total_weight'] }}</b></h6>
<hr>
<p>Costs</p>
<h6>VAT Cost: <b>${{ number_format($calc['vat_cost'], 2) }}</b></h6>
<h6>Service Charge Cost: <b>${{ number_format($calc['service_charge_cost'], 2) }}</b></h6>
<h6>Shipping Cost: <b>${{ number_format($calc['shipping_cost'], 2) }}</b></h6>
<h5>Total Cost: <b>${{ number_format($calc['total_cost'], 2) }}</b></h5>
<hr>
<h3>Estimated Landing Cost: <b>${{ number_format($calc['estimated_landing_cost'], 2) }}</b></h3>
<hr>


<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('order_admin_add_product_index') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="pid_order" value="{{ $order->pid_order }}" />
    <input type="hidden" name="pid_user" value="{{ $order->pid_user }}" />
    <input type="hidden" name="pid_admin" value="{{ $order->pid_admin }}" />
  

<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Generate Quote @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-file @endslot
@endcomponent

</form>



<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
      </div>
     </div>
    <!---------------------------------------------------------->
@endsection 
<!-- MAIN PAGE CONTENT STOPS -->


@section('footer')
    @parent
@endsection 



@section('footer_scripts')
    @parent
@endsection  