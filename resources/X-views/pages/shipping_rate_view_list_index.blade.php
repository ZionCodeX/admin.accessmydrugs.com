
@extends('layouts.base')


@section('title', 'Shipping Rate details')


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
            <h3 class="card-label">View Shipping Rate Details
            <i class="mr-2"></i>
            <small class=""> View Details</small></h3>
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

<div class="card card-custom card-stretch" id="kt_page_stretched_card">

    <div class="card-body">
        <div class="card-scrollx">
            Source Country: <b>{{ $shipping_rate->country_source_name ?? '' }}</b><hr>
            Destination Country: <b>{{ $shipping_rate->country_source_name ?? '' }}</b><hr>
            Shipping Rate ($/Kg): <b>{{ $shipping_rate->shipping_rate_kg ?? '' }}</b><hr>
            Shipping Rate ($/Cbm): <b>{{ $shipping_rate->shipping_rate_cbm ?? '' }}</b><hr>
            Status: <b>{{ $shipping_rate->status ?? '' }}</b><hr>
            Last Update: <b>{{ $shipping_rate->updated_at ?? '' }}</b><hr>
            Created On: <b>{{ $shipping_rate->created_at ?? '' }}</b><hr>
            Last Updated by Admin: <b>{{ $shipping_rate->pid_admin ?? '' }}</b><br>

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