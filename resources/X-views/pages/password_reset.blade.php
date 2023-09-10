
@extends('layouts.base')


@section('title', 'Password Reset')


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
            Password Reset
         <small></small>
        </h3>
       </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('dashboard') }}"  enctype="multipart/form-data">
    @csrf


<!--##### PASSWORD #####-->
@component('form.password')
    @slot('name') old_password @endslot
    @slot('id') old_password @endslot
    @slot('label') Old Password @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-key @endslot
    @slot('hint')Enter Old Password @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### PASSWORD #####-->
@component('form.password')
    @slot('name') new_password @endslot
    @slot('id') new_password @endslot
    @slot('label') New Password @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-key @endslot
    @slot('hint')New password @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### PASSWORD CONFIRM #####-->
@component('form.password')
    @slot('name') cpassword @endslot
    @slot('id') cpassword @endslot
    @slot('label') Confirm New Password @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-key @endslot
    @slot('hint')Confirm New password @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### CHECK BOX CUSTOMIZE LOGO AGREE TO TERMS #####-->
@component('form.checkbox')
    @slot('name') confirm @endslot
    @slot('id') confirm @endslot
    @slot('label') Confirm @endslot
    @slot('value')@endslot
    @slot('info') Confirm your action @endslot
    @slot('hint') @endslot
    @slot('required') required @endslot
@endcomponent


<hr>


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Update Password @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-key @endslot
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