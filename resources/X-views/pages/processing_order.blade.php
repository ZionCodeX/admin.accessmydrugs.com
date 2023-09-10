
@extends('layouts.base')


@section('title', 'Processing Order')


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
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Basic Form Layout</h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <button type="/" class="btn btn-primary mr-2">Back</button>
                </div>
            </div>
        </div>
        <!--############# begin::Form ##############-->

        <!--############# end::Form ################-->
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