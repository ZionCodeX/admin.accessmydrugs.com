
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
    <div class="content card">
    <div class="card-header"><b>D A S H B O A R D</b></div>
    <div class="card-body">
    <div class="row">


        <div class="col-lg-6 col-xl-3 col-sm-6 col-12" style="margin-bottom: 20px; padding-bottom:20px;">
          <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">

            <span class="card-icon primary d-flex justify-content-center mr-3">
              <i class="icon p-1 icon-bar-chart customize-icon font-large-2 p-1"></i>
            </span>

            <div class="card-body" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
              <span class="svg-icon svg-icon-2x svg-icon-info">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                  <i class="fas fa-users icon-3x"></i>
                <!--end::Svg Icon-->
              </span>
              <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
              <span class="font-weight-bold text-muted font-size-sm">Registered Users</span>
            </div>

            <span class="inc-dec-percentage">
              <small class="success"><!-- 5.2%--></small>
            </span>
          </div>
        </div>
        

        <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
          <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
            <span class="card-icon danger d-flex justify-content-center mr-3">
            </span>
            
            <div class="card-body" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
              <span class="svg-icon svg-icon-2x svg-icon-info">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                  <i class="fas fa-user-check icon-3x"></i>
                <!--end::Svg Icon-->
              </span>
              <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
              <span class="font-weight-bold text-muted font-size-sm">Active Users</span>
            </div>            

            <span class="inc-dec-percentage">
              <small class="danger"><!-- 5.2%--></small>
            </span>
          </div>
        </div>



        <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
          <div class="d-flex align-items-start border-right-blue-grey border-right-lighten-5">
            <span class="card-icon success d-flex justify-content-center mr-3">
            </span>

            <div class="card-body" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
              <span class="svg-icon svg-icon-2x svg-icon-info">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                <i class="fas fa-users-slash icon-3x"></i>
                <!--end::Svg Icon-->
              </span>
              <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
              <span class="font-weight-bold text-muted font-size-sm">Un-Activated Users</span>
            </div>

            <span class="inc-dec-percentage">
              <small class="success"><i class="fa fa-long-arrow-up"></i> <!-- 5.2%--></small>
            </span>
          </div>
        </div>



        <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
          <div class="d-flex align-items-start">
            <span class="card-icon warning d-flex justify-content-center mr-3">
            </span>

            <div class="card-body" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
              <span class="svg-icon svg-icon-2x svg-icon-info">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                <i class="info fa fa-box icon-3x"></i>
                <!--end::Svg Icon-->
              </span>
              <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">0</span>
              <span class="font-weight-bold text-muted font-size-sm">Completed Orders</span>
            </div>

            <span class="inc-dec-percentage">
              <small class="danger"><!-- 5.2%--></small>
            </span>
          </div>
        </div>



      </div>
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