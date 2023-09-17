
@extends('layouts.base')


@section('title', 'Add Product')


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
            <h3 class="card-label">Add Drug / Product
            <i class="mr-2"></i>
            <small class=""> PRODUCT MANAGEMENT </small></h3>
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


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('product_create_form_prox'); }}"  enctype="multipart/form-data">
    @csrf

  
<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') product_name @endslot
    @slot('id') product_name @endslot
    @slot('label') Drug / Product Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product Name @endslot
    @slot('icon') fa fa-cube @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT PRICE #####-->
@component('form.text')
    @slot('name') product_price @endslot
    @slot('id') product_price @endslot
    @slot('label') Unit Price @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product Unit Price @endslot
    @slot('icon') fa fa-money-bill-alt @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT PRICE #####-->
@component('form.text')
    @slot('name') product_price_old @endslot
    @slot('id') product_price_old @endslot
    @slot('label') Unit Price Old @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product Old Unit Price @endslot
    @slot('icon') fa fa-money-bill-alt @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') product_price_wholesale @endslot
    @slot('id') product_price_wholesale @endslot
    @slot('label') WholeSale Price @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter Product WholeSale Price @endslot
    @slot('icon') fa fa-money-bill-alt @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### PRODUCT CATEGORY SELECT #####-->
@component('form.select')
    @slot('name') product_category @endslot
    @slot('id') product_category @endslot
    @slot('label') Drug Category @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-layer-group @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value=""> - Select Category - </option>
            <option value="general"> General </option>
            <option value="analgesics"> Analgesics </option>
            <option value="antacids"> Antacids </option>
            <option value="antianxiety_drugs"> Antianxiety Drugs </option>
            <option value="antiarrhythmics"> Antiarrhythmics </option>
            <option value="antibacterials"> Antibacterials </option>
            <option value="antibiotics"> Antibiotics </option>
            <option value="anticoagulants_and_thrombolytics"> Anticoagulants and Thrombolytics </option>
            <option value="anticonvulsants"> Anticonvulsants </option>
            <option value="antidepressants"> Antidepressants </option>
            <option value="antidiarrheals"> Antidiarrheals </option>
            <option value="antiemetics"> Antiemetics </option>
            <option value="antifungals"> Antifungals </option>
            <option value="antihistamines"> Antihistamines </option>
            <option value="antihypertensives"> Antihypertensives </option>
            <option value="anti-inflammatories"> Anti-Inflammatories </option>
            <option value="antineoplastics"> Antineoplastics </option>
            <option value="antipsychotics"> Antipsychotics </option>
            <option value="antipyretics"> Antipyretics </option>
            <option value="antivirals"> Antivirals </option>
            <option value="barbiturates"> Barbiturates </option>
            <option value="beta-blockers"> Beta-Blockers </option>
            <option value="bronchodilators"> Bronchodilators </option>
            <option value="cold_cure"> Cold Cures </option>
            <option value="corticosteroids"> Corticosteroids </option>
            <option value="cough_suppressants"> Cough Suppressants </option>
            <option value="cytotoxics"> Cytotoxics </option>
            <option value="decongestants"> Decongestants </option>
            <option value="diuretics"> Diuretics </option>
            <option value="expectorant"> Expectorant </option>
            <option value="hormones"> Hormones </option>
            <option value="hypoglycemics"> Hypoglycemics </option>
            <option value="immunosuppressives"> Immunosuppressives </option>
            <option value="laxatives"> Laxatives </option>
            <option value="muscle_relaxants"> Muscle Relaxants </option>
            <option value="sedatives"> Sedatives </option>
            <option value="sex_hormones_female"> Sex Hormones (Female) </option>
            <option value="sex_hormones_male"> Sex Hormones (Male) </option>
            <option value="sleeping_drugs"> Sleeping Drugs </option>
            <option value="tranquilizer"> Tranquilizer </option>
            <option value="vitamins_and_supplements"> Vitamins & Supplements </option>
        @endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
@component('form.textarea')
    @slot('name') product_description @endslot
    @slot('id') editor1 @endslot
    @slot('label') Drug / Product Description @endslot
    @slot('value')@endslot
    @slot('placeholder')Enter Product Description here @endslot
    @slot('hint') About the Product @endslot
    @slot('maxlength') 1000000000 @endslot
    @slot('rows') 8 @endslot
    @slot('required') required @endslot
@endcomponent

<script>
  CKEDITOR.replace( 'editor1' );
</script>


<!--##### TEXT POST DESCRIPTION #####-->
@component('form.textarea')
    @slot('name') product_summary @endslot
    @slot('id') product_summary @endslot
    @slot('label') Drug / Product Summary @endslot
    @slot('value')@endslot
    @slot('placeholder')Enter a brief description for SEO here @endslot
    @slot('hint') For SEO Optimization (Optional) @endslot
    @slot('maxlength') 300 @endslot
    @slot('rows') 3 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT POST TAGS #####-->
@component('form.textarea')
    @slot('name') product_tags @endslot
    @slot('id') product_tags @endslot
    @slot('label') Tags @endslot
    @slot('value') @endslot
    @slot('placeholder') Enter Drugs / Product Tags for SEO Optimization here separated by commas @endslot
    @slot('hint') For SEO Optimization provide tags separated by commas e.g. Headache, Body Pain, Panadol Extra, etc. (Optional) @endslot
    @slot('maxlength') 300 @endslot
    @slot('rows') 3 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.date')
    @slot('name') expiry_date @endslot
    @slot('id') expiry_date @endslot
    @slot('label') Expiration Date @endslot
    @slot('value') @endslot
    @slot('placeholder') Enter Product Expiry Date @endslot
    @slot('icon') fa fa-calendar @endslot
    @slot('hint') Drug / Product Expiry Date @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') product_quantity @endslot
    @slot('id') product_quantity @endslot
    @slot('label') Quantity in stock @endslot
    @slot('value') @endslot
    @slot('placeholder') Enter Product Quantity or Opening stock @endslot
    @slot('icon') fa fa-cubes @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent




<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') procurement_cost @endslot
    @slot('id') procurement_cost @endslot
    @slot('label') Cost of Procurement @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter cost of procuring product in Naira(₦) @endslot
    @slot('icon') fa fa-shipping-fast @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') shipping_cost @endslot
    @slot('id') shipping_cost @endslot
    @slot('label') Cost of Shipping @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter shipping cost in Naira(₦) @endslot
    @slot('icon') fa fa-ship @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT PRODUCT NAME #####-->
@component('form.text')
    @slot('name') tax @endslot
    @slot('id') tax @endslot
    @slot('label') Tax @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter applicable tax rate in % @endslot
    @slot('icon') fa fa-percent @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### FILE UPLOAD #####-->
@component('form.upload')
    @slot('name') product_image @endslot
    @slot('id') product_image @endslot
    @slot('label') Upload Product Image @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') fa fa-file-image @endslot
    @slot('hint')Upload Image @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### CHECK BOX PUBLISH POST #####-->
@component('form.checkbox')
    @slot('name') shipping_status @endslot
    @slot('id') shipping_status @endslot
    @slot('label') Free Shipping @endslot
    @slot('value') free @endslot
    @slot('info') Check this for Free Shipping @endslot
    @slot('hint') @endslot
    @slot('required') @endslot
@endcomponent


<!--##### CHECK BOX PUBLISH POST #####-->
@component('form.checkbox')
    @slot('name') product_visibility @endslot
    @slot('id') product_visibility @endslot
    @slot('label') Product Visibility in Store @endslot
    @slot('value') hide @endslot
    @slot('info') Check this to hide product from Shop @endslot
    @slot('hint') @endslot
    @slot('required') @endslot
@endcomponent


<hr>


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Add to Store @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-cubes @endslot
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