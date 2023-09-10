
@extends('layouts.base')


@section('title', 'Orders Processing View')


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
            <h3 class="card-label">Orders Processing
            <i class="mr-2"></i>
            <small class=""> | View Processing Orders</small></h3>
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


@foreach ( $order_show_pending as $record )


<!--DATE CALCULATION STARTS-->
  @php
    $diffInDays = \Carbon\Carbon::parse($record->updated_at)->diffInDays();
    $showDiff = \Carbon\Carbon::parse($record->updated_at)->diffForHumans();
    if($diffInDays > 0){
      $showDiff .= ', '.' + '.\Carbon\Carbon::parse($record->created_at)->addDays($diffInDays)->diffInHours().' Hours';
        }
  @endphp
<!--DATE CALCULATION STOPS-->


<div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample{{ $loop->iteration }}">
    <div class="card">


      <div class="card-header warning" id="headingOne{{ $loop->iteration }}">
        <div class="card-title" data-toggle="collapse" data-target="#collapseOne{{ $loop->iteration }}">
         <i class="fas fa-file-signature"></i><b>{{ $loop->iteration }} :: </b> &nbsp; {{ $record->order_name ?? "" }} &nbsp; <small>( <small><b>{{ $showDiff }}</b></small> ) </small>
        </div>
       </div>


     <div id="collapseOne{{ $loop->iteration }}" class="collapse " data-parent="#accordionExample{{ $loop->iteration }}">
      <div class="card-body">
      
        <div class="form-group mb-0">
       
            <div class="checkbox-list">
                <span><b>Order ID:</b> {{ $record->pid_order ?? "" }}</span><br>
                <span><b>Product Name:</b> {{ $record->order_name ?? "" }}</span><br>
                <span><b>Status:</b> {{ $record->status ?? "" }}</span><br>


            </div><hr>
            <a href="{{ route('order_quotes_create_index', ['pid_request' => $record->pid_request, 'pid_user' => $record->pid_user]); }}" class="btn btn-secondary font-weight-bold font-size-h7 px-4 py-3 mr-2">
                <i class="fas fa-edit"></i> Modify Quote 
            </a>
        </div>
        
      </div>
     </div>
    </div>

   </div>

<hr>

@endforeach


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