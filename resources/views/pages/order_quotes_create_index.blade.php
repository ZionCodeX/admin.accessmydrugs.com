
@extends('layouts.base')


@section('title', 'Order Quotes')


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
            <h3 class="card-label">Create Order Quote
            <i class="mr-2"></i>
            <small class=""> Create Quote for Client base on the Request #2341</small></h3>
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
<form method="post" action="{{ route('order_quotes_create_prox'); }}"  enctype="multipart/form-data">
    @csrf


<input type="hidden" name="pid_request" value="{{ $request_show_single->pid_request; }}" >
<input type="hidden" name="pid_user" value="{{ $pid_user; }}" >

  
<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') order_name @endslot
    @slot('id') order_name @endslot
    @slot('label') Order Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Order name here @endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT #####-->
@component('form.select')
    @slot('name') currency_main @endslot
    @slot('id') currency_main @endslot
    @slot('label') Currency @endslot
    @slot('value')@endslot
    @slot('icon') far fa-money-bill-alt @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="Dollar">($) US Dollar</option>						
            <option value="Yuan">(¥) Chinese Yuan</option>
            <option value="Naira">(N) Nigerian Naira </option>
            <option value="Kenyan_shillings">(K) Kenyan Shillings </option>
        @endslot
@endcomponent



<!--##### HTML TEXT AREA EDITOR CK-EDITOR PRODUCT INFORMATION #####-->
@component('form.textarea')
    @slot('name') order_info @endslot
    @slot('id') editor @endslot
    @slot('label') General Order Information @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('hint') Provide additional information for this order for the client if any @endslot
    @slot('maxlength') @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent


<hr>


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


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Create Order Quote @endslot
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