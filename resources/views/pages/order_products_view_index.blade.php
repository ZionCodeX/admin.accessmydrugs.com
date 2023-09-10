
@extends('layouts.base')


@section('title', 'Create Product')


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
            <h3 class="card-label">Add Product
            <i class="mr-2"></i>
            <small class=""> Add Products to your Order</small></h3>
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

<h6>Order Name: <b>{{ $order_show_single->order_name ?? "" }}</b> </h6> 
<h6>Order ID: <b>{{ $order_show_single->pid_order ?? "" }}</b> </h6> 
<hr>
<h6>Request Name: <b>{{ $request_show_single->product_name ?? "" }}</b> </h6> 
<h6>Request ID: <b>{{ $pid_request ?? "" }}</b> </h6> 
<h6>User ID: <b>{{ $pid_user ?? "" }}</b> </h6>
<hr>

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('products_create_prox'); }}"  enctype="multipart/form-data">
    @csrf


<input type="hidden" name="pid_request" value="{{ $pid_request; }}" >
<input type="hidden" name="pid_order" value="{{ $pid_order; }}" >
<input type="hidden" name="pid_user" value="{{ $pid_user; }}" >
<input type="hidden" name="pid_admin" value="{{ $pid_admin; }}" >

  
<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') product_name @endslot
    @slot('id') product_name @endslot
    @slot('label') Product Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product name here @endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') @endslot
    @slot('maxlength') 500 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') product_link @endslot
    @slot('id') product_link @endslot
    @slot('label') Product Link @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product link here @endslot
    @slot('icon') fas fa-link @endslot
    @slot('hint') @endslot
    @slot('maxlength') 500 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### SELECT #####-->
@component('form.select')
    @slot('name') product_category @endslot
    @slot('id') product_category @endslot
    @slot('label') Product Category @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-clipboard-list @endslot
    @slot('hint') Select Product Category @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="CAT_A">CAT A: Contains Liquid or Battery</option>
            <option value="CAT_B">CAT B: Contains no Liquid or Battery</option>
        @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.number')
    @slot('name') product_price @endslot
    @slot('id') product_price @endslot
    @slot('label') Product Price ($ Dollars) @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product price here @endslot
    @slot('icon') fas fa-money-bill-alt @endslot
    @slot('hint') @endslot
    @slot('maxlength') 15 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.number')
    @slot('name') product_weight @endslot
    @slot('id') product_weight @endslot
    @slot('label') Product Weight (Kg) @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter the product weight in Kg (Kilograms) or cbm (Cubic Meters) for Sea Shipping only @endslot
    @slot('icon') fas fa-weight-hanging @endslot
    @slot('hint') @endslot
    @slot('maxlength') 15 @endslot
    @slot('required') required step="0.001" min="0.00" max="9999999999" @endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR PRODUCT INFORMATION #####-->
@component('form.textarea')
    @slot('name') product_info @endslot
    @slot('id') editor @endslot
    @slot('label') Product Information @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('hint') Provide additional information for this order for the client if any @endslot
    @slot('maxlength') 300 @endslot
    @slot('rows') 3 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### FILE UPLOAD #####-->
@component('form.upload')
    @slot('name') product_image @endslot
    @slot('id') product_image @endslot
    @slot('label') Upload Product Image @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') far fa-file-image @endslot
    @slot('hint')Upload File @endslot
    @slot('required')@endslot
@endcomponent

<hr>

<!--
    <div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text"><b>Admin Notice!</b></div>
        <div class="alert-text">Approve only Orders above $500</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
-->


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Add Product @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-list @endslot
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