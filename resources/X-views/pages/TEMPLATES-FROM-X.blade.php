<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('dashboard') }}"  enctype="multipart/form-data">
    @csrf

  
<!--##### TEXT #####-->
@component('form.text')
    @slot('name') name @endslot
    @slot('id') name @endslot
    @slot('label') Name @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter name here @endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') Enter @endslot
    @slot('maxlength') 8 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### PASSWORD #####-->
@component('form.password')
    @slot('name') password @endslot
    @slot('id') password @endslot
    @slot('label') Password @endslot
    @slot('value')@endslot
    @slot('placeholder') Enter name here @endslot
    @slot('icon') fas fa-key @endslot
    @slot('hint')Enter password @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### SELECT #####-->
@component('form.select')
    @slot('name') name @endslot
    @slot('id') name @endslot
    @slot('label') Select @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="YES">Yes</option>
            <option value="NO">No</option>
        @endslot
@endcomponent


<!--##### TEXT AREA #####-->
@component('form.textarea')
    @slot('name') info @endslot
    @slot('id') info @endslot
    @slot('label') Info @endslot
    @slot('value')@endslot
    @slot('placeholder')Enter your text here @endslot
    @slot('hint') Enter @endslot
    @slot('maxlength') 3 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
@component('form.textarea')
    @slot('name') info @endslot
    @slot('id') editor @endslot
    @slot('label') Info @endslot
    @slot('value')@endslot
    @slot('placeholder')Enter your text here @endslot
    @slot('hint') Enter @endslot
    @slot('maxlength') 3 @endslot
    @slot('rows') 4 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### FILE UPLOAD #####-->
@component('form.upload')
    @slot('name') file @endslot
    @slot('id') file @endslot
    @slot('label') Upload File @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-key @endslot
    @slot('hint')Upload File @endslot
    @slot('required')@endslot
@endcomponent


<!--##### RADIO BUTTON #####-->
@component('form.radiobutton')
    @slot('name') gender @endslot
    @slot('id') @endslot
    @slot('label') Gender @endslot
    @slot('title1') Male @endslot
    @slot('title2') Female @endslot
    @slot('value1') MALE @endslot
    @slot('value2') FEMALE @endslot
    @slot('hint') Select your Gender @endslot
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


<!--##### RADIO BUTTON #####-->
@component('form.radiobuttonspecial')
    @slot('name') gender @endslot
    @slot('id') @endslot
    @slot('label') Gender @endslot
    @slot('title1') Male @endslot
    @slot('value1') MALE @endslot
    @slot('subtitle1') Select Male @endslot
    @slot('title2') Female @endslot
    @slot('subtitle2') Select Female @endslot
    @slot('value2') FEMALE @endslot
    @slot('hint') Select your Gender @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TIME #####-->
@component('form.time')
    @slot('name') conn_name @endslot
    @slot('id') conn_name @endslot
    @slot('label') Connection Name @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-box @endslot
    @slot('hint')This is the hint @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### DATE #####-->
@component('form.date')
    @slot('name') date @endslot
    @slot('id') datex @endslot
    @slot('label') Date @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-calendar @endslot
    @slot('hint') Select Date @endslot
    @slot('required') required @endslot
@endcomponent


<hr>


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Update @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-check @endslot
@endcomponent


</form>

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->