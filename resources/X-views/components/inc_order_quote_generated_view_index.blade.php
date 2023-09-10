
      
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">
          <div class="card-title">
            <h3 class="card-label"><b>QUOTE</b> | &nbsp; <small style="color: black;">@php $order_statusx = str_replace('_', ' ', $order_status);  echo Str::upper($order_statusx); @endphp </small>
            <i class="mr-2"></i>
            <small class=""></small></h3>
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

<!--CHECK FOR EMPTY RECORDS-->
@if($counts['count_'.$order_status] <= 0)
          <div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">No records available</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
@endif



@foreach ( $orders['load_'.$order_status] as $record )
@if($record->status == $order_status)


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
       <i class="fas fa-file-signature"></i><b>{{ $loop->iteration }} :: </b> &nbsp; {{ $record->order_name ?? "" }} &nbsp; <small><i class="fas fa-clock"></i> : <small><b>{{ $showDiff }}</b></small> </small>
      </div>
     </div>

    <div id="collapseOne{{ $loop->iteration }}" class="collapse show" data-parent="#accordionExample{{ $loop->iteration }}">
    <div class="card-body">
    
      <div class="form-group mb-0">
          @include("components.inc_quotes")
      </div>
      
    </div>
   </div>
  </div>


 </div>


 <hr>
@endif
@endforeach

<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
      </div>
     </div>