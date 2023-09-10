
@extends('layouts.base')


@section('title', 'Product Details List')


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
            <h3 class="card-label">Product Details
            <i class="mr-2"></i>
            <small class=""> View Details</small></h3>
          </div>

          <div class="card-toolbar">
            <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
             
             <a href="{{ route('dashboard') }}" class="btn btn-light-dark font-weight-bolder mr-2">
            <i class="ki ki-long-plus icon-xs"></i>Edit Product</a>
            
            </div>
          </div>
          
        </div>
        <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<div class="card card-custom card-stretch" id="kt_page_stretched_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ $product->product_name ?? '' }} | <small>Qty in Stock: <b>{{ $product->product_quantity ?? '' }}</b></small></h3>
        </div>
    </div>
    <div class="card-body">
        <div class="card-scrollx">
                    <style>
                        .imgx{
                            height: 400px;
                            width: 50%;
                            object-fit: cover;
                            border-radius: 30px;
                            }
                    </style>			
                    {{-- IMAGE BOX STARTS --}}
                        @if (empty($product->product_image))
                        <img class="imgx" src = '{{ URL::asset('storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp")' height="165px">
                        @else
                        <img class="imgx" src = '{{ URL::asset('storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp")' height="165px">
                        @endif
                    {{-- IMAGE BOX ENDS --}}
                    <hr><br>

            PRODUCT NAME: <b>{!! $product->product_name ?? '' !!}</b>
                        <hr>
            PRICE: <b>₦{!! $product->product_price ?? '' !!}</b>
                        <hr>
            DESCRIPTION: <b>{!! $product->product_description ?? '' !!}</b>
                        <hr>
            CATEGORY: <b>{!! $product->product_category ?? '' !!}</b>
                        <hr>
            SUMMARY: <b>{!! $product->product_tags ?? '' !!}</b>
                                    <hr>
            QUANTITY IN STOCK: <b>{!! $product->product_quantity ?? '' !!}</b>
                                    <hr>
            VISIBILITY IN STORE: <b>{!! $product->product_visibility ?? '' !!}</b>
                                    <hr>
            TAGS: <b>{!! $product->product_tags ?? '' !!}</b>
                                                <hr>
            ADDED: <b>{!! $product->created_at ?? '' !!}</b>
                                                <hr>
            LAST UPDATE: <b>{!! $product->updated_at ?? '' !!}</b>
            
        </div>
    </div>
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