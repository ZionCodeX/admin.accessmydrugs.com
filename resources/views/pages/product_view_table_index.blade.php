
@extends('layouts.base')


@section('title', 'View Products')


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
            <h3 class="card-label">View Products in Store
            <i class="mr-2"></i>
            <small class=""> View Products</small></h3>
          </div>

          <div class="card-toolbar">
            <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
             
             <a href="{{ route('product_create_form_index') }}" class="btn btn-light-dark font-weight-bolder mr-2">
            <i class="ki ki-long-plus icon-xs"></i>Add Drug /Product</a>
             
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
            <th>Image</th>
            <th>Drug / Product Name</th>
            <th>Price (₦)</th>
            <th>Qty in Stock</th>
            <th>Product Visibility</th>
            <th>Created</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
            <tr>
            
                <td>{{ $loop->iteration }}</td>
                

                <td>
                    {{-- IMAGE BOX STARTS --}}
                        @if (empty($product->product_image))
                            <img class="imgx" src = "{{ URL::asset('public/storage/images/default.jpg') }}?r=@php echo(rand()); @endphp" height="55px"></div>
                        @else
                            <img class="imgx" src = "{{ URL::asset('public/storage/images') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp" height="55px"></div>
                        @endif
                    {{-- IMAGE BOX ENDS --}}
                </td>  
  

                <td>
                   <b>{{ $product->product_name }}</b>  <br>

                    <hr>
                    Categories<br>

                    <ul>
                            <li>{{ $product->product_category }} </li>

                        @if (($product->product_sub_category1 == "") || ($product->product_sub_category1 == " ") || ($product->product_sub_category1 == null))
                            
                        @else
                            <li>{{ $product->product_sub_category1 }} </li>
                        @endif


                        @if (($product->product_sub_category2 == "") || ($product->product_sub_category2 == " ") || ($product->product_sub_category2 == null))
                            
                        @else
                            <li>{{ $product->product_sub_category2 }} </li>
                        @endif


                    </ul>

                    <hr>

                    <form action="{{ route('product_feature_record_prox'); }}" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="pid_product" value="{{ $product->pid_product }}" />
                        <button type="submit" class="btn btn-light-dark btn-sm">Feature this product</button>
                        <input type="checkbox" required >
                    </form>

                </td>
                

                <td>{{ $product->product_price }}</td>
                <td>{{ $product->product_quantity }}</td>


                <td>
                    @if (($product->product_visibility == '') || ($product->product_visibility == null) || ($product->product_visibility == 'show'))
                        <!--<span class="label label-inline label-light-success font-weight-bold">
                             In Shop
                        </span>-->
                        <a href="{{ url('product/visibility/'.$product->pid_product.'/'.'show'.'/prox'); }}" class="btn"><button type="button" class="btn btn-success btn-sm">Hide</button></a>
                    @endif

                    @if ($product->product_visibility == 'hide')
                        <!--<span class="label label-inline label-light-warning font-weight-bold">
                            Not in Shop
                        </span>-->
                        <a href="{{ url('product/visibility/'.$product->pid_product.'/'.'hide'.'/prox'); }}" class="btn"><button type="button" class="btn btn-warning btn-sm">Show</button></a>
                    @endif
                </td>

                <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                
                <td>
                    <a href="{{ url('product/view/'.$product->pid_product.'/list/index'); }}" class="btn"><i class="bi bi-list"></i></a>
                    <a href="{{ url('product/update/'.$product->pid_product.'/form/index'); }}" class="btn"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('product_delete_record_prox'); }}" method="post" class="d-inline">
                        @csrf

                        <input type="hidden" name="pid_product" value="{{ $product->pid_product }}" />
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