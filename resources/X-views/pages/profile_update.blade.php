
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
    <div class="card card-custom gutter-b">
      <div class="card-header">
       <div class="card-title">
        <h3 class="card-label">
         Profile Update
         <small></small>
        </h3>
       </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('dashboard') }}"  enctype="multipart/form-data">
    @csrf

<!--##### TEXT COMPANY NAME #####-->
@component('form.text')
    @slot('name') company_name @endslot
    @slot('id') company_name @endslot
    @slot('label') Company / Organisation Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter company name here @endslot
    @slot('icon') fas fa-building @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT CORPORATE WEBSITE #####-->
@component('form.text')
    @slot('name') corporate_website @endslot
    @slot('id') corporate_website @endslot
    @slot('label') Corporate Website URL @endslot
    @slot('value')  @endslot
    @slot('placeholder') Enter URL here (Optional) @endslot
    @slot('icon') fas fa-link @endslot
    @slot('hint') Example: https://www.cnn.com/ @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT EMAIL #####-->
@component('form.text')
    @slot('name') email @endslot
    @slot('id') email @endslot
    @slot('label') Official Email @endslot
    @slot('value')  @endslot
    @slot('placeholder') Enter email here @endslot
    @slot('icon') fas fa-envelope @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT EMAIL #####-->
@component('form.text')
    @slot('name') email2 @endslot
    @slot('id') email2 @endslot
    @slot('label') Confirm Email @endslot
    @slot('value')  @endslot
    @slot('placeholder') Enter email here @endslot
    @slot('icon') fas fa-envelope @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PHONE #####-->
@component('form.number')
    @slot('name') phone @endslot
    @slot('id') phone @endslot
    @slot('label') Official Phone @endslot
    @slot('value')  @endslot
    @slot('placeholder') Enter Phone Number @endslot
    @slot('icon') fas fa-phone @endslot
    @slot('hint') @endslot
    @slot('maxlength') 12 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT COMPANY FIRST NAME #####-->
@component('form.text')
    @slot('name') first_name @endslot
    @slot('id') first_name @endslot
    @slot('label') First Name @endslot
    @slot('value')@endslot
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
    @slot('value')@endslot
    @slot('placeholder') Enter Contact Person Last Name @endslot
    @slot('icon') fas fa-user @endslot
    @slot('hint') Name of Contact Person for Company @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT COMPANY POSITION OF CONTACT PERSON #####-->
@component('form.text')
    @slot('name') rep_position @endslot
    @slot('id') rep_position @endslot
    @slot('label') First Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Contact Person First Name @endslot
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
            <option value="">-Select-</option>
            <option value="MEDICAL">Health</option>
            <option value="EDUCATIONAL">Education</option>
            <option value="HUMAN_RESOURCES">Human Resources</option>
            <option value="RELIGION">Religion</option>
            <option value="HUMAN_RESOURCES">Human Resources</option>
        @endslot
@endcomponent


<!--##### TIME CALL BEST TIME #####-->
@component('form.time')
    @slot('name') call_best_time @endslot
    @slot('id') call_best_time @endslot
    @slot('label') Call Best Time @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-clock @endslot
    @slot('hint')This is the best time (Nigerian Time) you will like to be contacted @endslot
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