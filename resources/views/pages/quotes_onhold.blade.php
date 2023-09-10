
@extends('layouts.base')


@section('title', 'Quotes On-Hold')


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
         Quotes On-Hold
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
            @include("components.inc_quotes_onhold")
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