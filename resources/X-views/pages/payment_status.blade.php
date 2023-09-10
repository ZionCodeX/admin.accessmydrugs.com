
@extends('layouts.base')


@section('title', 'Payment Status')


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
         Payment Status
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
            <th scope="col">Order ID</th>
            <th scope="col">Order Name</th>
            <th scope="col">Payment Type</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>236563</td>
            <td>Office Chair</td>
            <td>BANK</td>
            <td>$2500</td>
            <td>
                <span class="label label-inline label-light-success font-weight-bold">
                    APPROVED
                </span>
            </td>
            <td>23-04-2021</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>756232</td>
            <td>Folder Boxes</td>
            <td>BANK</td>
            <td>$700</td>
            <td>
                <span class="label label-inline label-light-danger font-weight-bold">
                    PENDING
                </span>
            </td>
            <td>27-04-2021</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>5652342</td>
            <td>Plastic Chairs</td>
            <td>CARD</td>
            <td>$1300</td>
            <td>
                <span class="label label-inline label-light-success font-weight-bold">
                    APPROVED
                </span>
            </td>
            <td>29-04-2021</td>
        </tr>
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