
@extends('layouts.base')


@section('title', 'Dashboard')


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
            <h3 class="card-title">Request Quote</h3>
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

    
    <!--FORM :: ELEMENT :: TEXT-INPUT :: name --> 
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Product Name </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="product_name" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
               <!--hint-->
         </div>
        </div>
       </div>
         
    
    
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Product Quantity </b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
          <input class="form-control" id="kt_typeahead_2" name="product_quantity" type="text" dir="" placeholder=""/>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
       
          <div class="row">
            <label class="col-form-label text-right col-lg-3 col-sm-12"> <b> Product Link </b> </label>
            <div class="col-2">
              <input type="text" class="form-control" id="kt_typeahead_2" placeholder="https://" name="product_link">
            </div>
            <div class="col-5">
              <input type="text" class="form-control" id="kt_typeahead_2" placeholder="" name="product_link">
            </div>
            <div class="form-text text-muted">
                <!--hint-->
          </div>
          </div>
          <br>
    
    
    
    
    
    
    
    
    
    
    
    <!--FORM :: ELEMENT :: FILE-UPLOAD :: name --> 
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"><b>Product Image</b> </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="product_image"/>
            <label class="custom-file-label" for="customFile"> UPLOAD IMAGE
            </label>
          </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    
    
    
    
    
       
    <!--FORM :: ELEMENT :: CHECKBOX :: name -->  
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12" style="margin-top: -8px"> 
    
            </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
                  <div class="checkbox-list">
                    <label class="checkbox">
                        <input type="checkbox"  name="checkbox"/>
                        <span></span>
    
    <!--Input your checkbox label -->
    <div style="margin-left: 30px; margin-top: -25px;">
        <b> I want my custom Branded Logo on product </b>
                    </label>
                    </div>
                </div>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
       <!--FORM :: ELEMENT :: FILE-UPLOAD :: name --> 
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">
            <b>Your Brand Logo</b> 
        </label>
        <div class="col-lg-6 col-md-9 col-sm-12">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="your_brand_logo"/>
            <label class="custom-file-label" for="customFile"> UPLOAD IMAGE
            </label>
          </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    
    
    
    <!--FORM :: ELEMENT :: TEXTAREA :: name --> 
       <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12"><b> General Product Information </b></label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
           <textarea class="form-control"rows="3" name="general_product_information"></textarea>
         </div>
         <div class="form-text text-muted">
          <!--hint-->
         </div>
        </div>
       </div>
    
    
    
    
    
    
    
    
    
    <!--FORM :: ELEMENT :: CHECKBOX :: name -->  
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12" style="margin-top: -8px"><b> Agree to Terms </b></label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
                  <div class="checkbox-list">
                    <label class="checkbox">
                        <input type="checkbox"  name="checkbox"/>
                        <span></span>
    
                      <!--Input your checkbox label --> 
    
                    </label>
                    
                </div>
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
       style="margin-left: 433px; width: 20%;">
       <b> Request Quote </b></button>
    
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