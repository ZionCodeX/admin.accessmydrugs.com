
@extends('layouts.base')


@section('title', 'Profile Update')


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
        <div class="alert-text">Dashboard | <small class="secondary"> Member Dashboard</small></div>
      </div>

    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">
          <div class="card-title">
            <h3 class="card-label">Profile Update
            <i class="mr-2"></i>
            <small class=""> Update your profile for better services</small></h3>
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
<form method="post" action="{{ route('profile_update_prox') }}"  enctype="multipart/form-data">
  @csrf

<!--##### TEXT EMAIL #####-->
@component('form.text')
@slot('name') email @endslot
@slot('id') email @endslot
@slot('label') Official Email @endslot
@slot('value') {{ $profile->email ?? "" }}  @endslot
@slot('placeholder') Enter email here @endslot
@slot('icon') fas fa-envelope @endslot
@slot('hint') @endslot
@slot('maxlength') 100 @endslot
@slot('required') required disabled @endslot
@endcomponent



<!--##### SELECT INDUSTRY COUNTRY #####-->
@component('form.select')
  @slot('name') country @endslot
  @slot('id') country @endslot
  @slot('label') Country @endslot
  @slot('value') {{ $profile->country ?? "" }} @endslot
  @slot('icon') fas fa-globe @endslot
  @slot('hint') This should be where your company is located @endslot
  @slot('required') required @endslot
      @slot('options')
          @include('components.inc_country_list')
      @endslot
@endcomponent



<!--##### TEXT COMPANY NAME #####-->
@component('form.text')
  @slot('name') company_name @endslot
  @slot('id') company_name @endslot
  @slot('label') Company / Organisation Name @endslot
  @slot('value') {{ $profile->company_name ?? "" }} @endslot
  @slot('placeholder') Enter company name here @endslot
  @slot('icon') fas fa-building @endslot
  @slot('hint') @endslot
  @slot('maxlength') 100 @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### TEXT PHONE #####-->
@component('form.number')
  @slot('name') phone @endslot
  @slot('id') phone @endslot
  @slot('label') Official Phone @endslot
  @slot('value') {{ $profile->phone ?? "" }} @endslot
  @slot('placeholder') Enter Phone Number @endslot
  @slot('icon') fas fa-phone @endslot
  @slot('hint') @endslot
  @slot('maxlength') 12 @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### TEXT CORPORATE WEBSITE #####-->
@component('form.text')
  @slot('name') company_website @endslot
  @slot('id') company_website @endslot
  @slot('label') Corporate Website URL @endslot
  @slot('value') {{ $profile->company_website ?? "" }} @endslot
  @slot('placeholder') Enter URL here (Optional) @endslot
  @slot('icon') fas fa-link @endslot
  @slot('hint') Example: https://www.cnn.com/ @endslot
  @slot('maxlength') 100 @endslot
  @slot('required') @endslot
@endcomponent


<!--##### TEXT COMPANY FIRST NAME #####-->
@component('form.text')
  @slot('name') first_name @endslot
  @slot('id') first_name @endslot
  @slot('label') First Name @endslot
  @slot('value') {{ $profile->first_name ?? "" }} @endslot
  @slot('placeholder') Enter Contact Person First Name @endslot
  @slot('icon') fas fa-user @endslot
  @slot('hint') Name of Contact Person for Company @endslot
  @slot('maxlength') 100 @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### TEXT COMPANY LAST NAME #####-->
@component('form.text')
  @slot('name') last_name @endslot
  @slot('id') last_name @endslot
  @slot('label') Last Name @endslot
  @slot('value') {{ $profile->last_name ?? "" }} @endslot
  @slot('placeholder') Enter Contact Person Last Name @endslot
  @slot('icon') fas fa-user @endslot
  @slot('hint') Name of Contact Person for Company @endslot
  @slot('maxlength') 100 @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### TEXT COMPANY POSITION OF CONTACT PERSON #####-->
@component('form.text')
  @slot('name') role @endslot
  @slot('id') role @endslot
  @slot('label') Role in Company @endslot
  @slot('value') {{ $profile->role ?? "" }} @endslot
  @slot('placeholder') Enter your work role in this company @endslot
  @slot('icon') fas fa-building @endslot
  @slot('hint') Name of Contact Person for Company @endslot
  @slot('maxlength') 100 @endslot
  @slot('required') required @endslot
@endcomponent


<!--##### SELECT INDUSTRY #####-->

@component('form.select')
  @slot('name') industry @endslot
  @slot('id') industry @endslot
  @slot('label') Select Industry @endslot
  @slot('value')@endslot
  @slot('icon') fas fa-tag @endslot
  @slot('hint') Select Industry @endslot
  @slot('required') required @endslot
      @slot('options')
          @include('components.inc_industries_list')
      @endslot
@endcomponent


<!--##### TEXT AREA COMPANY ADDRESS #####-->
@component('form.textarea')
    @slot('name') company_address @endslot
    @slot('id') company_address @endslot
    @slot('label') Company Address @endslot
    @slot('value') {{ $profile->company_address ?? "" }} @endslot
    @slot('placeholder')Enter Company Address here @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent



<!--##### TIME CALL BEST TIME #####-->
@component('form.time')
  @slot('name') call_best_time @endslot
  @slot('id') call_best_time @endslot
  @slot('label') Call Best Time @endslot
  @slot('value') {{ $profile->call_best_time ?? "" }} @endslot
  @slot('icon') fas fa-clock @endslot
  @slot('hint')This is the best time (Nigerian Time) you will like to be contacted @endslot
  @slot('required') required @endslot
@endcomponent



<!--##### FILE UPLOAD #####-->
{{-- IMAGE BOX (FORM) START --}}
@if (empty(auth()->user()->profile_image))
  @component('form.image')
      @slot('img')  <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ URL::asset('storage/app/image/default-user.jpg') }}?r=@php echo(rand()); @endphp" /> @endslot
      @slot('hint')Profile Image @endslot
  @endcomponent
@else
  @component('form.image')
      @slot('img')  <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ URL::asset('storage/app/profile_image') }}/{{ auth()->user()->profile_image }}?r=@php echo(rand()); @endphp" /> @endslot
      @slot('hint')Profile Image @endslot
  @endcomponent
@endif
{{-- IMAGE BOX (FORM) ENDS --}}


@component('form.upload')
    @slot('name') user_image @endslot
    @slot('id') user_image @endslot
    @slot('label') Upload Profile picture @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-upload @endslot
    @slot('hint')Upload File @endslot
    @slot('required')@endslot
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


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
  @slot('name') submit @endslot
  @slot('id') submit @endslot
  @slot('label') Update Profile @endslot
  @slot('value') buttonx @endslot
  @slot('color') primary @endslot
  @slot('icon') fas fa-check @endslot
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