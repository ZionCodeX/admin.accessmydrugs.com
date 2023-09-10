
@extends('layouts.base')


@section('title', 'Request OnHold View')


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
            <h3 class="card-label">On-Hold Requests
            <i class="mr-2"></i>
            <small class=""> | View Pending Request</small></h3>
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



<!--********** LOOP STARTS **********-->
@foreach ( $request_show_onhold as $record )




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

          <h5>Request No: <b>{{ $record->id }}</b></h5> 
          <h5>Request ID: <b>{{ $record->pid_request }}</b></h5><hr>
          <h5><small>Date of Request: <b>{{ $record->updated_at }}</b></small><small> (<b>{{$showDiff}}</b>)</small></h5><hr>
       
            <div class="checkbox-list">
                <span><b>Product Name:</b> {{ $record->product_name ?? "" }}</span><br>
                <span><b>Product Quantity:</b> {{ $record->product_quantity ?? "" }}</span><br>
                <span><b>Product Link:</b> {{ $record->product_link ?? "" }}</span><br>
                <span><b>General Info:</b> {{ $record->product_info ?? "" }}</span><br>

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





            <!--##### XIS STANDARD FORM STARTS #####-->
            <form name="request_form{{ $loop->iteration }}" id="request_form{{ $loop->iteration }}" method="post" action="{{ route('message_request_pending_prox') }}"  enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="pid_request" value="{{ $record->pid_request }}" />
              <input type="hidden" name="pid_user" value="{{ $record->pid_user }}" />
              <input type="hidden" name="pid_admin" value="{{ $pid_admin }}" />

            <!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
            @component('form.textarea')
                @slot('name') message @endslot
                @slot('id') editor @endslot
                @slot('label') Admin Information (Optional) @endslot
                @slot('value')@endslot
                @slot('placeholder') Please provide any additional information with regards to your action below. This is Optional @endslot
                @slot('hint') Optional Information @endslot
                @slot('maxlength') 600 @endslot
                @slot('rows') 4 @endslot
                @slot('required') @endslot
            @endcomponent


            <!--##### FILE UPLOAD #####-->
            @component('form.upload')
                @slot('name') message_image @endslot
                @slot('id') message_image @endslot
                @slot('label') Upload Document or Image @endslot
                @slot('title') Upload @endslot
                @slot('value')@endslot
                @slot('icon') fas fa-key @endslot
                @slot('hint') Files Allowed: jpg, png, gif, pdf, txt @endslot
                @slot('required')@endslot
            @endcomponent


            <!--##### CHECK BOX CUSTOMIZE LOGO #####-->
            @component('form.checkbox')
              @slot('name') confirm_action @endslot
              @slot('id') confirm_action @endslot
              @slot('label') @endslot
              @slot('value')@endslot
              @slot('info') Confirm Action @endslot
              @slot('hint')  @endslot
              @slot('required') required @endslot
            @endcomponent

            <div class="card-footer" style="text-align: center;">

              <div class="row">
                <div class="col-6">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') submit_lock @endslot
                      @slot('label') Lock Request | Start Processing @endslot
                      @slot('value') lock @endslot
                      @slot('color') secondary @endslot
                      @slot('icon') fas fa-lock @endslot
                  @endcomponent
                </div>

                <div class="col-6">
                  <!--##### SUBMIT BUTTON #####-->
                  @component('form.button')
                      @slot('name') buttonx @endslot
                      @slot('id') submit_reject @endslot
                      @slot('label') Reject | Place Request On-Hold @endslot
                      @slot('value') reject @endslot
                      @slot('color') warning @endslot
                      @slot('icon') fas fa-lock @endslot
                  @endcomponent
                </div>
              </div>

            </div>

          </form>
          <!--##### XIS STANDARD FORM STOPS #####-->


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