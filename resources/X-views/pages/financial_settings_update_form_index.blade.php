
@extends('layouts.base')


@section('title', 'Financial Settings Update')


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
            <h3 class="card-label">Financial Settings
            <i class="mr-2"></i>
            <small class=""> VAT & Service Charge</small></h3>
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
<form method="post" action="{{ route('financial_settings_update_form_prox') }}"  enctype="multipart/form-data">
    @csrf

<input type="hidden" name="id" value="{{ $financial_settings->id }}" >




<!--##### VATE RATE IN % #####-->
@component('form.number')
    @slot('name') vat @endslot
    @slot('id') vat @endslot
    @slot('label') VAT Rate (%) @endslot
    @slot('value') {{ $financial_settings->vat ?? '' }} @endslot
    @slot('placeholder') This VAT rate in %. @endslot
    @slot('icon') fas fa-chart-pie @endslot
    @slot('hint') Measured in Percentage (%) @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') step=0.001 required @endslot
@endcomponent


<!--##### SHIPPING RATE #####-->
@component('form.number')
    @slot('name') service_charge @endslot
    @slot('id') service_charge @endslot
    @slot('label') Service Charge Rate (% Per Total Cost) @endslot
    @slot('value') {{ $financial_settings->service_charge ?? '' }} @endslot
    @slot('placeholder') This Service Charge rate in % Per Total Cost. @endslot
    @slot('icon') fas fa-cube @endslot
    @slot('hint') Measures in Percentage (%) / Total Cost @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') step=0.001 required @endslot
@endcomponent


<!--##### ACTIVE STATUS #####-->
@component('form.select')
    @slot('name') active_status @endslot
    @slot('id') active_status @endslot
    @slot('label') Select Status @endslot
    @slot('value') {{ $shipping_rate->status ?? '' }} @endslot
    @slot('icon') fas fa-check @endslot
    @slot('hint') Select Status @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="{{ $shipping_rate->status ?? '' }}" selected>{{ $shipping_rate->status ?? '' }}</option>
            <option value="ACTIVE" selected>ACTIVE</option>
            <option value="DISABLED">DISABLED</option>
        @endslot
@endcomponent



<hr>


<!--##### CHECK BOX CUSTOMIZE LOGO AGREE TO TERMS #####-->
@component('form.checkbox')
    @slot('name') terms @endslot
    @slot('id') terms @endslot
    @slot('label') Terms @endslot
    @slot('value')@endslot
    @slot('info')  @endslot
    @slot('hint') @endslot
    @slot('required') required @endslot
@endcomponent



<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Update Financial Settings @endslot
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