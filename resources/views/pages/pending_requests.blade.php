
@extends('layouts.base')


@section('title', 'Pending Request')


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
         Quotes Request <small>(Pending)</small>
         <small></small>
        </h3>
       </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


<div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
    <div class="card">
     <div class="card-header" id="headingOne6">
      <div class="card-title" data-toggle="collapse" data-target="#collapseOne6">
       <i class="fas fa-file-signature"></i> Office Tables
      </div>
     </div>
     <div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
      <div class="card-body">
      
        <div class="form-group mb-0">
       
            <div class="checkbox-list">
                <span><b>Product Name:</b> Office Tables</span><br>
                <span><b>Product Quantity:</b> 2000</span><br>
                <span><b>Product Link:</b> https://www.alibaba.com/xiaomi/office-store/tables/3232332</span><br>
                <span><b>General Info:</b> This is where the products general information resides</span><br>
            </div><hr>
            <a href="{{ route('request_quotes'); }}" class="btn btn-secondary font-weight-bold font-size-h7 px-4 py-3 mr-2">
                <i class="fas fa-edit"></i> Modify Request
            </a>
        </div>
        
      </div>
     </div>
    </div>
    <div class="card">
     <div class="card-header" id="headingTwo6">
      <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo6">
       <i class="fas fa-file-signature"></i> 1500 Car Tyres
      </div>
     </div>
     <div id="collapseTwo6" class="collapse" data-parent="#accordionExample6">
      <div class="card-body">
       ...
      </div>
     </div>
    </div>
    <div class="card">
     <div class="card-header" id="headingThree6">
      <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree6">
       <i class="fas fa-file-signature"></i> 200 Yards of Metal foil
      </div>
     </div>
     <div id="collapseThree6" class="collapse" data-parent="#accordionExample6">
      <div class="card-body">
       ...
      </div>
     </div>
    </div>
   </div>


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