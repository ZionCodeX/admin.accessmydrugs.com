
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
        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
            <div class="card">
             <div class="card-header" id="headingOne6">
              <div class="card-title" data-toggle="collapse" data-target="#collapseOne6">
               <i class="flaticon-pie-chart-1"></i> Office Tables
              </div>
             </div>
             <div id="collapseOne6" class="collapse show" data-parent="#accordionExample6">
              <div class="card-body">
               ...
              </div>
             </div>
            </div>
            <div class="card">
             <div class="card-header" id="headingTwo6">
              <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo6">
               <i class="flaticon2-notification"></i> 1500 Car Tyres
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
               <i class="flaticon2-chart"></i> 200 Yards of Metal foil
              </div>
             </div>
             <div id="collapseThree6" class="collapse" data-parent="#accordionExample6">
              <div class="card-body">
               ...
              </div>
             </div>
            </div>
           </div>
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