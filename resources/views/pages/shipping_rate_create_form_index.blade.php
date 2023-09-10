
@extends('layouts.base')


@section('title', 'Shipping Rate')


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
            <h3 class="card-label">Shipping Rate
            <i class="mr-2"></i>
            <small class=""> Add Shipping Rates here</small></h3>
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
<form method="post" action="{{ route('shipping_rate_create_form_prox') }}"  enctype="multipart/form-data">
    @csrf



<!--##### PROCUREMENT COUNTRY #####-->
@component('form.select')
    @slot('name') country_source_name @endslot
    @slot('id') country_source_name @endslot
    @slot('label') Procurement Country @endslot
    @slot('value') @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            @include('components.inc_country_list') 
        @endslot
@endcomponent


<!--##### PROCUREMENT COUNTRY CURRENCY  #####-->
@component('form.select')
    @slot('name') country_source_currency @endslot
    @slot('id') country_source_currency @endslot
    @slot('label') Procurement Country Currency @endslot
    @slot('value') USD @endslot
    @slot('icon') fas fa-currency @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="USD" selected>USD (US Dollars)</option>
        @endslot
@endcomponent


<!--##### DESTINATION COUNTRY #####-->
@component('form.select')
    @slot('name') country_destination_name @endslot
    @slot('id') country_destination_name @endslot
    @slot('label') Destination Country @endslot
    @slot('value') @endslot
    @slot('icon') fas fa-globe @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            @include('components.inc_country_list') 
        @endslot
@endcomponent


<!--##### DESTINATION COUNTRY CURRENCY #####-->
@component('form.select')
    @slot('name') country_destination_currency @endslot
    @slot('id') country_destination_currency @endslot
    @slot('label') Destination Country Currency @endslot
    @slot('value') @endslot
    @slot('icon') fas fa-currency @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            @foreach ($exchange_rates as $rate)
                <option value="{{ $rate->currency2 }}">{{ $rate->currency2 }} ({{ $rate->exchange_name }})</option>
            @endforeach
        @endslot
@endcomponent


<!--##### SHIPPING RATE DOLLARS / KG #####-->
@component('form.number')
    @slot('name') shipping_rate_kg @endslot
    @slot('id') shipping_rate_kg @endslot
    @slot('label') Shipping Rate ($/Kg) @endslot
    @slot('value')  @endslot
    @slot('placeholder') This shipping rate in Dollars/Kg. @endslot
    @slot('icon') fas fa-weight-hanging @endslot
    @slot('hint') Measured in Dollars / Kilogram @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### SHIPPING RATE #####-->
@component('form.number')
    @slot('name') shipping_rate_cbm @endslot
    @slot('id') shipping_rate_cbm @endslot
    @slot('label') Shipping Rate ($/Cbm) @endslot
    @slot('value')  @endslot
    @slot('placeholder') This shipping rate in Dollars / Cbm. @endslot
    @slot('icon') fas fa-cube @endslot
    @slot('hint') Measures in Dollars / Cubic Meter @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


@component('form.text')
    @slot('name') shipping_duration @endslot
    @slot('id') shipping_duration @endslot
    @slot('label') Shipping Duration @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Shipping Duration here e.g. 2 Days, 3 Weeks, 1 Month etc. @endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') Enter Shipping Duration here e.g. 2 Days, 3 Weeks, 1 Month etc @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT AREA #####-->
@component('form.textarea')
    @slot('name') shipping_info @endslot
    @slot('id') shipping_info @endslot
    @slot('label') Shipping Info (Optional) @endslot
    @slot('value')@endslot
    @slot('placeholder') Any additional information? @endslot
    @slot('hint') Enter @endslot
    @slot('maxlength') 1000 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### ACTIVE STATUS #####-->
@component('form.select')
    @slot('name') active_status @endslot
    @slot('id') active_status @endslot
    @slot('label') Select Status @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-check @endslot
    @slot('hint') Select Status @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="ACTIVE" selected>ACTIVE</option>
            <option value="DISABLED">DISABLED</option>
        @endslot
@endcomponent



<hr>



<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Add Shipping Rate @endslot
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