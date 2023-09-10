
@extends('layouts.base')


@section('title', 'Order View')


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



{{--//////////////// ORDER REQUEST /////////////// --}}
@if ( 
      ($order_status == 'ATTEMPTED') || 
      ($order_status == 'PROCESSING') || 
      ($order_status == 'IN_TRANSIT') || 
      ($order_status == 'ARRIVED') ||
      ($order_status == 'DELIVERED') ||
      ($order_status == 'CANCELLED')
    )
  @include('components.inc_order_shop')
@endif



      
    <!---------------------------------------------------------->
@endsection 
<!-- MAIN PAGE CONTENT STOPS -->


@section('footer')
    @parent
@endsection 



@section('footer_scripts')
    @parent
@endsection  