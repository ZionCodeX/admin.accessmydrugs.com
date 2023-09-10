
@extends('layouts.base')


@section('title', 'Request Processing View')


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
            <h3 class="card-label">Processing Requests
            <i class="mr-2"></i>
            <small class=""> | View Processing Request</small></h3>
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


@foreach ( $request_show_processing as $record )


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
         <i class="fas fa-file-signature"></i><b>{{ $loop->iteration }} :: </b> &nbsp; {{ $record->product_name ?? "" }} &nbsp; <small>( <small><b>{{ $showDiff }}</b></small> ) </small>
        </div>
       </div>


     <div id="collapseOne{{ $loop->iteration }}" class="collapse " data-parent="#accordionExample{{ $loop->iteration }}">
      <div class="card-body">
      
        <div class="form-group mb-0">
       
            <div class="checkbox-list">
                <span><b>Product Name:</b> {{ $record->product_name ?? "" }}</span><br>
                <span><b>Product Quantity:</b> {{ $record->product_quantity ?? "" }}</span><br>
                <span><b>Product Link:</b> {{ $record->product_link ?? "" }}</span><br>
                <span><b>General Info:</b> {{ $record->product_info ?? "" }}</span><br>

                <span><b>Destination Country:</b> {{ $record->destination_country ?? "" }}</span><br>
                <span><b>Procurment Country:</b> {{ $record->procurement_country ?? "" }}</span><br>
                <span><b>Shipping Plan:</b> {{ $record->shipping_plan ?? "" }}</span><br>

                <span><b>Product Image:</b> 
                  {{-- IMAGE BOX START --}}
                      @if (empty($record->product_image))
                        <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ url('https://procurement.spreaditglobal.com/storage/app/image/default-image.jpg') }}"?r=@php echo(rand()); @endphp />
                      @else
                        <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ url('https://procurement.spreaditglobal.com/storage/app/product_image') }}/{{ $record->product_image ?? '' }}"?r=@php echo(rand()); @endphp />
                      @endif
                  {{-- IMAGE BOX ENDS --}}
                </span><br>

                <span><b>Brand Logo:</b> 
                    {{-- IMAGE BOX START --}}
                        @if (empty($record->brand_image))
                          <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ url('https://procurement.spreaditglobal.com/storage/app/image/default-image.jpg') }}"?r=@php echo(rand()); @endphp />
                        @else
                          <img class="img-thumbnailx" height="55px" style="border-radius: 10px;" src="{{ url('https://procurement.spreaditglobal.com/storage/app/brand_image') }}/{{ $record->brand_image ?? '' }}"?r=@php echo(rand()); @endphp />
                        @endif
                    {{-- IMAGE BOX ENDS --}}
                </span><br>

            </div><hr>
            <a href="{{ route('order_quotes_create_index', ['pid_request' => $record->pid_request, 'pid_user' => $record->pid_user]); }}" class="btn btn-secondary font-weight-bold font-size-h7 px-4 py-3 mr-2">
                <i class="fas fa-edit"></i> Create Order Quote 
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