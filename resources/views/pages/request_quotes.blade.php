
@extends('layouts.base')


@section('title', 'Request Quote')


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
         Request Quote
         <small></small>
        </h3>
       </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('bank_payment') }}"  enctype="multipart/form-data">
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
    @slot('name') quantity @endslot
    @slot('id') quantity @endslot
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
    @slot('required') required @endslot
@endcomponent


<!--##### FILE UPLOAD PRODUCT IMAGE #####-->
@component('form.upload')
    @slot('name') brand_logo @endslot
    @slot('id') brand_logo @endslot
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
    @slot('maxlength') 3 @endslot
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