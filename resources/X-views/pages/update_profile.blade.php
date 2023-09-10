
@extends('layouts.base')


@section('title', 'Processing Order')


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
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Pending / Processing Quotes/Orders</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <button type="/" class="btn btn-primary mr-2">Back</button>
                </div>
            </div>
        </div>
        <!--############# begin::Form ##############-->
  <!--FORM :: STARTS-->
 <form>
    <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
<br>
    
    <h2 style="text-align: center; font-size: 20px;"><b>Section 1</b></h2><br>
    
    
    <div class="card card-custom">
        <div class="card-header card-header-right ribbon ribbon-clip ribbon-left">
         <div class="ribbon-target" style="top: 12px;">
          <span class="ribbon-inner bg-warning"></span>Ribbon
         </div>
         <h3 class="card-title">
          Clip Style
         </h3>
        </div>
        <div class="card-body">
         ...
        </div>
       </div>
    
    
    
    
    <!--FORM :: ELEMENT :: TEXT-INPUT :: name --> 
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Name of Organization</b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="name_of_organization" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
               <!--hint-->
         </div>
        </div>
       </div>
         
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Corporate Website</b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="corporate_website" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Email (Official) </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="email" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Confirm Email </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="confirm_email" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Phone Number (Official) </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="phone_number" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
       
       
       
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> First Name (Contact Person) </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="first_name" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
       
       
       
    
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Last Name (Contact Person) </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="last_name" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    
    
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Position in Company </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="position_in_company" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    
    
    
    <!--FORM :: BUTTON --> 
    <br>
     <div class="row">
      <div class="col-lg-9 ml-lg-auto">
       <button type="submit" class="btn btn-primary font-weight-bold mr-2" 
       style="width: 40%; margin-left: 700px; width: 20%;">
       <b>NEXT ></b></button>
    
      </div>
     </div>
    <br>
    
    
    
    <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
    <!--FORM ENDS-->
     </form>
        <!--############# end::Form ################-->
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