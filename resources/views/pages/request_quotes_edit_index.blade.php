
@extends('layouts.base')


@section('title', 'Request Quotes Edit')


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
            <h3 class="card-label">Update Request Quotes
            <i class="mr-2"></i>
            <small class=""> Just tell us what you will like to purchase</small></h3>
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
<form method="post" action="{{ route('request_quotes_update_prox') }}"  enctype="multipart/form-data">
    @csrf

  
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


<!--##### TEXT PRODUCT QUANTITY #####-->
@component('form.number')
    @slot('name') product_quantity @endslot
    @slot('id') product_quantity @endslot
    @slot('label') Quantity @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter product Quantity @endslot
    @slot('icon') fas fa-boxes @endslot
    @slot('hint') @endslot
    @slot('maxlength') 10 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT LINK #####-->
@component('form.text')
    @slot('name') product_link @endslot
    @slot('id') product_link @endslot
    @slot('label') Product Link @endslot
    @slot('value')  @endslot
    @slot('placeholder') Enter Product Link here @endslot
    @slot('icon') fas fa-link @endslot
    @slot('hint') Example: https://www.aliexpress.com/shoes/232434 @endslot
    @slot('maxlength') 50 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### FILE UPLOAD #####-->
{{-- IMAGE BOX (FORM) START --}}
@if (empty(auth()->user()->product_image))
  @component('form.image')
      @slot('img')  <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ URL::asset('storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp" /> @endslot
      @slot('hint')Product Image @endslot
  @endcomponent
@else
  @component('form.image')
      @slot('img')  <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ URL::asset('storage/app/product_image') }}/{{ auth()->user()->profile_image }}?r=@php echo(rand()); @endphp" /> @endslot
      @slot('hint')Product Image @endslot
  @endcomponent
@endif
{{-- IMAGE BOX (FORM) ENDS --}}



<!--##### FILE UPLOAD PRODUCT IMAGE #####-->
@component('form.upload')
    @slot('name') product_image @endslot
    @slot('id') product_image @endslot
    @slot('label') Upload Product Image @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-upload @endslot
    @slot('hint')Upload File @endslot
    @slot('required')@endslot
@endcomponent


<!--##### CHECK BOX CUSTOMIZE LOGO #####-->
@component('form.checkbox')
    @slot('name') custom_logo @endslot
    @slot('id') custom_logo @endslot
    @slot('label') Customize Logo @endslot
    @slot('value')@endslot
    @slot('info') I want my custom branded logo on product  @endslot
    @slot('hint') Select @endslot
    @slot('required') @endslot
@endcomponent




<!--##### FILE UPLOAD #####-->
{{-- IMAGE BOX (FORM) START --}}
@if (empty(auth()->user()->brand_image))
  @component('form.image')
      @slot('img')  <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ URL::asset('storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp" /> @endslot
      @slot('hint')Brand Image @endslot
  @endcomponent
@else
  @component('form.image')
      @slot('img')  <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ URL::asset('storage/app/brand_image') }}/{{ auth()->user()->profile_image }}?r=@php echo(rand()); @endphp" /> @endslot
      @slot('hint')Brand Image @endslot
  @endcomponent
@endif
{{-- IMAGE BOX (FORM) ENDS --}}


<!--##### FILE UPLOAD PRODUCT IMAGE #####-->
@component('form.upload')
    @slot('name') brand_image @endslot
    @slot('id') brand_image @endslot
    @slot('label') Upload Brand Logo @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-upload @endslot
    @slot('hint')Upload Brand Logo @endslot
    @slot('required')@endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR PRODUCT INFORMATION #####-->
@component('form.textarea')
    @slot('name') product_info @endslot
    @slot('id') editor @endslot
    @slot('label') General Product Information @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('hint') Provide additional information for this product if any @endslot
    @slot('maxlength') 200 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### CHECK BOX CUSTOMIZE LOGO AGREE TO TERMS #####-->
@component('form.checkbox')
    @slot('name') terms @endslot
    @slot('id') terms @endslot
    @slot('label') Terms @endslot
    @slot('value')@endslot
    @slot('info') Agree to Terms & Conditions @endslot
    @slot('hint') @endslot
    @slot('required') required @endslot
@endcomponent


<hr>


<div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text"><b>Just before you submit this quote request.</b></div>
    <div class="alert-text">Immediately you submit this request, our procurement team will swing into action to get you the best deal. <br>
        Please, make sure you are really interested in receiving a quote from us as you will not be able to submit another quote request until you have acted on the quote we send.<br>
        Thank your for choosing Spreadit.</div>
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
    @slot('label') Request Quote @endslot
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