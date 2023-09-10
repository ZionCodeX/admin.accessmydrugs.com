



<form method="post" action="{{ route('config_webhr') }}"  enctype="multipart/form-data">
    @csrf


<!--##### TEXT #####-->
@component('form.text')
    @slot('name') Click me @endslot
    @slot('label') danger @endslot
    @slot('value')  danger    @endslot
    @slot('placeholder') danger @endslot
    @slot('icon') fas fa-plus @endslot
@endcomponent


<!--##### TEXT #####-->
@component('form.text')
    @slot('name') Click me @endslot
    @slot('label') danger @endslot
    @slot('value')  danger    @endslot
    @slot('placeholder') danger @endslot
    @slot('icon') fas fa-plus @endslot
@endcomponent


<!--##### SELECT #####-->
@component('form.select')
    @slot('name') Select @endslot
    @slot('label') SELECT OBJECT @endslot
    @slot('value') danger @endslot
    @slot('placeholder') danger @endslot
    @slot('icon') fas fa-plus @endslot
    @slot('options')
        <option value="option1">option 1</option> 
        <option value="option2">option 2</option> 
        <option value="option3">option 3</option>
    @endslot
@endcomponent


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') Click me @endslot
    @slot('color') danger @endslot
    @slot('icon') fas fa-plus @endslot
@endcomponent


</form>
