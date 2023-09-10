<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<!--##### XIS STANDARD FORM #####-->
<form name="profile_actors" method="post" action="{{ route('dashboard') }}"  enctype="multipart/form-data">
    @csrf


<br>
<h3>Profile Actor <hr></h3>

  
<!--##### TEXT EMAIL #####-->
@component('form.text')
    @slot('name') email @endslot
    @slot('id') name @endslot
    @slot('label') Email @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-envelope @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') disabled @endslot
@endcomponent


<!--##### TEXT STAGE NAME #####-->
@component('form.text')
    @slot('name') stage_name @endslot
    @slot('id') stage_name @endslot
    @slot('label') Stage Name @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-hat-wizard @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT FIRST NAME #####-->
@component('form.text')
    @slot('name') first_name @endslot
    @slot('id') first_name @endslot
    @slot('label') First Name @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-user @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT LAST NAME #####-->
@component('form.text')
    @slot('name') last_name @endslot
    @slot('id') last_name @endslot
    @slot('label') Last Name @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-user @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### TEXT OTHER NAME #####-->
@component('form.text')
    @slot('name') other_name @endslot
    @slot('id') other_name @endslot
    @slot('label') Other Name @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-user @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT PHONE #####-->
@component('form.number')
    @slot('name') phone @endslot
    @slot('id') phone @endslot
    @slot('label') Phone @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-phone @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT PROFESSION #####-->
@component('form.text')
    @slot('name') profession @endslot
    @slot('id') profession @endslot
    @slot('label') Profession @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-briefcase @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### RADIO BUTTON GENDER #####-->
@component('form.radiobutton')
    @slot('name') gender @endslot
    @slot('id') @endslot
    @slot('label') Gender @endslot
    @slot('title1') Male @endslot
    @slot('title2') Female @endslot
    @slot('value1') MALE @endslot
    @slot('value2') FEMALE @endslot
    @slot('hint') Select your Gender @endslot
    @slot('required')  @endslot
@endcomponent


<!--##### FILE UPLOAD #####-->
@component('form.upload')
    @slot('name') file @endslot
    @slot('id') file @endslot
    @slot('label') Upload Profile picture @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-upload @endslot
    @slot('hint')Upload File @endslot
    @slot('required')@endslot
@endcomponent


<br>
<h3>Contact Location <hr></h3>


<!--##### SELECT COUNTRY #####-->
@component('form.select')
    @slot('name') country @endslot
    @slot('id') country @endslot
    @slot('label') Country @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-globe @endslot
    @slot('hint') Country of Residence @endslot
    @slot('required') required @endslot
        @slot('options')
            @include('../../components/inc_country_list')
        @endslot
@endcomponent


<!--##### SELECT STATE #####-->
@component('form.select')
    @slot('name') state @endslot
    @slot('id') state @endslot
    @slot('label') State @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-flag @endslot
    @slot('hint') State of Residence @endslot
    @slot('required') required @endslot
        @slot('options')
            @include('../../components/inc_states_list_nigeria')
        @endslot
@endcomponent


<!--##### TEXT CITY #####-->
@component('form.text')
    @slot('name') city @endslot
    @slot('id') city @endslot
    @slot('label') City @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-map @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT STREET #####-->
@component('form.text')
    @slot('name') street @endslot
    @slot('id') street @endslot
    @slot('label') Street @endslot
    @slot('value')@endslot
    @slot('placeholder')  @endslot
    @slot('icon') fas fa-map @endslot
    @slot('hint') @endslot
    @slot('maxlength') 100 @endslot
    @slot('required') @endslot
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
    @slot('label') Update @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-check @endslot
@endcomponent


</form>

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->