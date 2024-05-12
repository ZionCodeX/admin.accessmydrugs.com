
@extends('layouts.base')


@section('title', 'Order Record')


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
            <b>{{ $status_type ?? '' }}</b> ORDERS (<b>{{ $count_orders_x ?? '' }}</b> Orders) | {{ $order_status ?? ''}}
         <small></small>
        </h3>
       </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order Details</th>
            <th scope="col">Product Details</th>
            <th scope="col">Order Status</th>
            <th scope="col">Date </th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>



    @foreach ($orders as $record)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            

            <td>
                <b>Order ID: </b>{{ $record->pid_order ?? '' }} <br>
                <b>Customer Name: </b>{{ $record->first_name.' '.$record->last_name ?? 'NA' }} <br>
                <b>Contact: </b>{{ $record->email.' | '.$record->phone ?? 'NA' }} <br>
                <b>Location: </b>{{ $record->city ?? 'NA' }} 
            </td>
            

            <td>
                <b>Product ID: </b>{{ $record->pid_order ?? 'NA' }} <br>
                <b>Product Name: </b>{{ $record->first_name.' '.$record->last_name ?? 'NA' }} <br>
                <!--<b> Qty: </b>1<br>-->
                <b>Total Cost: </b>₦{{ $record->order_total_cost/100 ?? 'NA' }} 
            </td>

            
            <td>
                @if(empty($record->status) || $record->status == null)
                    <span class="label label-inline label-light-danger font-weight-bold" style="color: rgb(78, 43, 43)">
                        Attempted
                    </span>
                @elseif ($record->status == 'ATTEMPTED')
                    <span class="label label-inline label-light-success font-weight-bold" style="color: rgb(78, 43, 43)">
                        Attmpted
                    </span>
                @elseif ($record->status == 'PAID')
                    <span class="label label-inline label-light-success font-weight-bold" style="color: green">
                        Paid
                    </span>
                @elseif ($record->status == 'PROCESSING')
                    <span class="label label-inline label-light-success font-weight-bold" style="color: blue">
                        Processing
                    </span>

                @elseif ($record->status == 'IN_TRANSIT')
                    <span class="label label-inline label-light-success font-weight-bold" style="color: purple">
                        In-Transit
                    </span>
                @elseif ($record->status == 'DELIVERED')
                    <span class="label label-inline label-light-success font-weight-bold" style="color: yellow">
                        Delivered
                    </span>
                @elseif ($record->status == 'CANCELLED')
                    <span class="label label-inline label-light-success font-weight-bold" style="color: red">
                        Cancelled
                    </span>
                @endif
            </td>
            <td>{{ $record->created_at ?? '' }}</td>

            <td>

                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Update Status
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Processing</a>
                      <a class="dropdown-item" href="#">In-Transit</a>
                      <a class="dropdown-item" href="#">Delivered</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Cancelled</a>
                    </div>
                  </div>
            </td>
        </tr>
    @endforeach



    </tbody>
</table>



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