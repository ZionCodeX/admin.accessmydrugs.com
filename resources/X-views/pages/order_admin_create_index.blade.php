
@extends('layouts.base')


@section('title', 'Create Order')


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
            <h3 class="card-label">Create Customer Quote
            <i class="mr-2"></i>
            <small class=""> Create Spreadit Customer Quote here</small></h3>
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
<form method="post" action="{{ route('order_admin_create_prox') }}"  enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="pid_order" value="{{ $order->pid_order }}" />
    <input type="hidden" name="pid_user" value="{{ $order->pid_user }}" />
    <input type="hidden" name="pid_admin" value="{{ $order->pid_admin }}" />
  
<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') order_name @endslot
    @slot('id') order_name @endslot
    @slot('label') Request / Order Name @endslot
    @slot('value') {{ $order->request_product_name ?? ''}} @endslot
    @slot('placeholder') Enter Order name here @endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### CURRENCY TYPE #####-->
@component('form.select')
    @slot('name') order_currency_main @endslot
    @slot('id') order_currency_main @endslot
    @slot('label') Select Currency @endslot
    @slot('value')@endslot
    @slot('icon') far fa-money-bill-alt @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="USD" selected>($) US Dollars</option>
            <option value="YUAN">(¥) Chinese Yuan</option>
            <option value="NGN">(₦) Naira</option>
        @endslot
@endcomponent


<!--##### SHIPPING PLAN #####-->
@component('form.select')
    @slot('name') request_procurement_country @endslot
    @slot('id') request_procurement_country @endslot
    @slot('label') Select Procurement Country @endslot
    @slot('value') {{ $order->request_procurement_country ?? ''}} @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="{{ $order->request_procurement_country ?? ''}}" selected>{{ $order->request_procurement_country ?? ''}}</option>
            @foreach ($country_shipping_rate as $record)
                <option value="{{ $record->country_slug }}">{{ $record->country_name }}</option>
            @endforeach
        @endslot
@endcomponent


<!--##### SHIPPING RATE #####-->
@component('form.text')
    @slot('name') order_shipping_rate @endslot
    @slot('id') order_shipping_rate @endslot
    @slot('label') Shipping Rate @endslot
    @slot('value') {{ '$'.$sh_rate_kg->shipping_rate_kg.'/Kg' }} @endslot
    @slot('placeholder') This shipping rate is based on Procurement Country @endslot
    @slot('icon') far fa-money-bill-alt @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required disabled @endslot
@endcomponent


<!--##### SHIPPING PLAN #####-->
@component('form.select')
    @slot('name') request_shipping_plan @endslot
    @slot('id') request_shipping_plan @endslot
    @slot('label') Select Shipping Plan @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-ship @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="{{ $order->request_shipping_plan ?? ''}}" selected>{{ $order->request_shipping_plan ?? ''}}</option>
            <option value="AIR_SHIPPING">AIR SHIPPING</option>
            <option value="SEA_SHIPPING">SEA FREIGHT SHIPPING</option>
        @endslot
@endcomponent


<!--##### DESTINATION COUNTRY #####-->
@component('form.select')
    @slot('name') request_destination_country @endslot
    @slot('id') request_destination_country @endslot
    @slot('label') Select Destination Country @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-globe @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required disabled @endslot
        @slot('options')
            @include('components.inc_country_list')
            <option value="{{ $order->request_destination_country ?? ''}}" selected>{{ $order->request_destination_country ?? ''}}</option>
        @endslot
@endcomponent


<!--##### SHIPPING ADDRESS #####-->
@component('form.textarea')
    @slot('name') request_destination_address @endslot
    @slot('id') request_destination_address @endslot
    @slot('label') Destination Address @endslot
    @slot('value') {{ $order->request_destination_address ?? ''}} @endslot
    @slot('placeholder')  @endslot
    @slot('hint') Enter @endslot
    @slot('maxlength') 3 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required disabled @endslot
@endcomponent


<!--##### ORDER VAT #####-->
@component('form.number')
    @slot('name') order_vat @endslot
    @slot('id') order_vat @endslot
    @slot('label') Order VAT (%) @endslot
    @slot('value') {{ $financial_settings->vat }} @endslot
    @slot('placeholder') Enter VAT @endslot
    @slot('icon') fas fa-file-alt @endslot
    @slot('hint') @endslot
    @slot('maxlength') 10 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### ORDER VAT #####-->
@component('form.number')
    @slot('name') order_service_charge @endslot
    @slot('id') order_service_charge @endslot
    @slot('label') Order Service Charge (%) @endslot
    @slot('value') {{ $financial_settings->service_charge }} @endslot
    @slot('placeholder') Enter Service Charge @endslot
    @slot('icon') fas fa-file @endslot
    @slot('hint') @endslot
    @slot('maxlength') 10 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR PRODUCT INFORMATION #####-->
@component('form.textarea')
    @slot('name') order_info @endslot
    @slot('id') editor @endslot
    @slot('label') General Order Information @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('hint') Provide additional information for this order if any @endslot
    @slot('maxlength') 200 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### CHECK BOX CUSTOMIZE LOGO AGREE TO TERMS #####-->
@component('form.checkbox')
    @slot('name') confirm @endslot
    @slot('id') confirm @endslot
    @slot('label') Confirm @endslot
    @slot('value')@endslot
    @slot('info') Confirm Your Action @endslot
    @slot('hint') @endslot
    @slot('required') required @endslot
@endcomponent


<hr>



<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Create Quote @endslot
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