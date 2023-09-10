
@extends('layouts.base')


@section('title', 'View Shipping Rates')


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
            <h3 class="card-label">View Shipping Rates
            <i class="mr-2"></i>
            <small class=""> View / Update Rates</small></h3>
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
<style>
    .imgx{
        height: 70px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        }
</style>

<div class="table-responsive">
<table class="table table-bordered">

    <thead>
        <tr>
            <th>S/N</th>
            <th>Source Country</th>
            <th>Destination Country</th>
            <th>($/Kg)</th>
            <th>($/Cbm)</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($shipping_rates as $rate)
            <tr>
            
                <td>{{ $loop->iteration }}</td>

                <td>{{ $rate->country_source_name }}</td>
                <td>{{ $rate->country_destination_name }}</td>
                <td>{{ $rate->shipping_rate_kg }}</td>
                <td>{{ $rate->shipping_rate_cbm }}</td>

                <td>
                    @if ($rate->status == 'ACTIVE')
                        <span class="label label-inline label-light-success font-weight-bold">
                            {{ $rate->status }}
                        </span>
                    @endif

                    @if (($rate->status == 'DISABLED') || ($rate->status == null))
                        <span class="label label-inline label-light-warning font-weight-bold">
                            {{ $rate->status }}
                        </span>
                    @endif
                </td>

                
                <td>
                    <a href="{{ url('shipping/rate/view/'.$rate->pid_shipping_rate.'/list/index'); }}" class="btn"><i class="bi bi-list"></i></a>
                    <a href="{{ url('shipping/rate/update/'.$rate->pid_shipping_rate.'/form/index'); }}" class="btn"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('shipping_rate_delete_record_prox'); }}" method="post" class="d-inline">
                        @csrf

                        <input type="hidden" name="pid_shipping_rate" value="{{ $rate->pid_shipping_rate }}" />
                        <button class="btn danger" type="submit"><i class="bi bi-trash-fill"></i></button>
                        <input type="checkbox" required >
                    </form>
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
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