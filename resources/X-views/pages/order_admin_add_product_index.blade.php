
@extends('layouts.base')


@section('title', 'Order :: Add Products')


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
            <h3 class="card-label">Add products to Quote
            <i class="mr-2"></i>
            <small class=""> Add multiple products to cutomer's quote</small></h3>
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


<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('order_admin_add_product_prox') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="pid_order" value="{{ $order->pid_order }}" />
    <input type="hidden" name="pid_user" value="{{ $order->pid_user }}" />
    <input type="hidden" name="pid_admin" value="{{ $order->pid_admin }}" />
  

  
<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') product_name @endslot
    @slot('id') product_name @endslot
    @slot('label') Product Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter product name here @endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') @endslot
    @slot('maxlength') 50 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT CATEGORY #####-->
@component('form.select')
    @slot('name') product_category @endslot
    @slot('id') product_category @endslot
    @slot('label') Select Category @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="CAT_A">CAT A :: Contains Liquid or Battery</option>
            <option value="CAT_B">CAT B :: Contains No Liquid or Battery</option>
        @endslot
@endcomponent


<!--##### TEXT PRODUCT LINK #####-->
@component('form.text')
    @slot('name') product_link @endslot
    @slot('id') product_link @endslot
    @slot('label') Product Link @endslot
    @slot('value')  @endslot
    @slot('placeholder') Enter Product Link here (Optional)@endslot
    @slot('icon') fas fa-link @endslot
    @slot('hint') Example: https://www.aliexpress.com/shoes/232434 @endslot
    @slot('maxlength') 50 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT PRODUCT UNIT PRICE #####-->
@component('form.number')
    @slot('name') product_price @endslot
    @slot('id') product_price @endslot
    @slot('label') Product Unit Price ($) @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product Price @endslot
    @slot('icon') fas fa-money-check-alt @endslot
    @slot('hint') Product Price in USD($) @endslot
    @slot('maxlength') 10 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT QUANTITY #####-->
@component('form.number')
    @slot('name') product_quantity @endslot
    @slot('id') product_quantity @endslot
    @slot('label') Product Quantity @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter product Quantity @endslot
    @slot('icon') fas fa-boxes @endslot
    @slot('hint') @endslot
    @slot('maxlength') 10 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT WEIGHT #####-->
@component('form.number')
    @slot('name') product_weight @endslot
    @slot('id') product_weight @endslot
    @slot('label') Product Unit Weight @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter the product weight in Kg (Kilograms) or cbm (Cubic Meters) for Sea Shipping only @endslot
    @slot('icon') fas fa-weight-hanging @endslot
    @slot('hint') @endslot
    @slot('maxlength') 10 @endslot
    @slot('required') step="0.001" min="0.00" max="9999999999" required @endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR PRODUCT INFORMATION #####-->
@component('form.textarea')
    @slot('name') product_info @endslot
    @slot('id') product_info @endslot
    @slot('label') General Product Information @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('hint') Provide additional information for this product if any (Optional) @endslot
    @slot('maxlength') 200 @endslot
    @slot('rows') 4 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### CHECK BOX CUSTOMIZE LOGO AGREE TO TERMS #####-->
@component('form.checkbox')
    @slot('name') confirm @endslot
    @slot('id') confirm @endslot
    @slot('label') Confirm @endslot
    @slot('value')@endslot
    @slot('info') Confirm Action @endslot
    @slot('hint') @endslot
    @slot('required') required @endslot
@endcomponent


<hr>


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