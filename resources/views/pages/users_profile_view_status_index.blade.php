
@extends('layouts.base')


@section('title', 'Users Record')


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
            <b>{{ $status_type ?? '' }}</b> Accounts (<b>{{ $count_x ?? '' }}</b> Customers)
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
            <th scope="col">Customer ID</th>
            <th scope="col">Contact Details</th>
            <th scope="col">Status</th>
            <th scope="col">Created </th>
        </tr>
    </thead>
    <tbody>



    @foreach ($users_x as $record)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            

            <td>
                <!--<h4>{{ $record->company_name ?? '' }}</h4>-->
                <b>ID: </b>{{ $record->pid_user ?? '' }} <br>
            </td>
            
            <td>
                <b>Name: </b>{{ $record->first_name.' '.$record->last_name ?? 'NA' }} <br>
                <b>Email: </b>{{ $record->email ?? '' }} <br> 
                <b>Phone: </b>{{ $record->phone ?? '' }}
            </td>
            
            <td>
                @if(empty($record->email_verified_at))
                    <span class="label label-inline label-light-danger font-weight-bold">
                        UN-ACTIVATED
                    </span>
                @else
                    <span class="label label-inline label-light-success font-weight-bold">
                        ACTIVATED
                    </span>
                @endif
            </td>
            <td>{{ $record->created_at ?? '' }}</td>
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