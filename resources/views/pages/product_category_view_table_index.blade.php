
@extends('layouts.base')


@section('title', 'View Products Category')


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
            <h3 class="card-label">View Products Category in Store
            <i class="mr-2"></i>
            <small class=""> View Products Category</small></h3>
          </div>

          <div class="card-toolbar">
            <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
             
             <a href="{{ route('product_category_create_form_index') }}" class="btn btn-light-dark font-weight-bolder mr-2">
            <i class="ki ki-long-plus icon-xs"></i>Add Category</a>

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
            <th>Drug Category Name</th>
            <th>Slug</th>
            <th>Created</th>
            <th>Updated</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($product_categories as $category)
            <tr>
            
                <td>{{ $loop->iteration }}</td>
                

                <td>{{ $category->category_name }}</td>

                <td>{{ $category->category_slug }}</td>



                <td>{{ date('Y-m-d', strtotime($category->created_at)) }}</td>
                <td>{{ date('Y-m-d', strtotime($category->updated_at)) }}</td>
                
                <td>
                    <a href="{{ url('product/category/view/'.$category->pid_category.'/list/index'); }}" class="btn"><i class="bi bi-list"></i></a>
                    <a href="{{ url('product/category/update/'.$category->pid_category.'/form/index'); }}" class="btn"><i class="bi bi-pencil-square"></i></a>
                    
                    <form action="{{ route('product_category_delete_record_prox'); }}" method="post" class="d-inline">
                        @csrf

                        <input type="hidden" name="pid_category" value="{{ $category->pid_category }}" />
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