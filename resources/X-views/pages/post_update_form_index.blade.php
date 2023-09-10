
@extends('layouts.base')


@section('title', 'Update NewsFeed Post')


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
            <h3 class="card-label">Update NewsFeed Post
            <i class="mr-2"></i>
            <small class=""> Update News / Article</small></h3>
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


<!--##### XIS STANDARD FORM #####-->
<form method="post" action="{{ route('post_update_form_prox'); }}"  enctype="multipart/form-data">
    @csrf

<input type="hidden" name="pid_post" value="{{ $post->pid_post }}" />
  
<!--##### TEXT POST TITLE #####-->
@component('form.text')
    @slot('name') post_title @endslot
    @slot('id') post_title @endslot
    @slot('label') Post Title @endslot
    @slot('value'){{ $post->post_title ?? '' }}@endslot
    @slot('placeholder') Enter Post Title here @endslot
    @slot('icon') far fa-newspaper @endslot
    @slot('hint') @endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### HTML TEXT AREA EDITOR CK-EDITOR #####-->
@component('form.textarea')
    @slot('name') post_article @endslot
    @slot('id') editor1 @endslot
    @slot('label') Article @endslot
    @slot('value'){{ $post->post_article ?? '' }}@endslot
    @slot('placeholder')News / Article here @endslot
    @slot('hint') Main Article @endslot
    @slot('maxlength') 1000000000 @endslot
    @slot('rows') 8 @endslot
    @slot('required') required @endslot
@endcomponent
<script>
  CKEDITOR.replace( 'editor1' );
</script>


<!--##### TEXT POST DESCRIPTION #####-->
@component('form.textarea')
    @slot('name') post_description @endslot
    @slot('id') post_description @endslot
    @slot('label') Post Description @endslot
    @slot('value'){{ $post->post_description ?? '' }}@endslot
    @slot('placeholder')Enter a brief description for SEO here @endslot
    @slot('hint') For SEO Optimization (Optional) @endslot
    @slot('maxlength') 300 @endslot
    @slot('rows') 3 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### TEXT POST TAGS #####-->
@component('form.textarea')
    @slot('name') post_tags @endslot
    @slot('id') post_tags @endslot
    @slot('label') Post Tags @endslot
    @slot('value'){{ $post->post_tags ?? '' }}@endslot
    @slot('placeholder') Enter Article Tags for SEO here separated by commas (Optional)@endslot
    @slot('hint') For SEO Optimization provide tags separated by commas e.g. house, rent, esatate, to-let, sell-property, land etc. @endslot
    @slot('maxlength') 300 @endslot
    @slot('rows') 3 @endslot
    @slot('required') @endslot
@endcomponent


<!--##### CATEGORY SELECT #####-->
@component('form.select')
    @slot('name') post_category @endslot
    @slot('id') post_category @endslot
    @slot('label') Select Category @endslot
    @slot('value')@endslot
    @slot('icon') fas fa-layer-group @endslot
    @slot('hint') Select Options @endslot
    @slot('required') required @endslot
        @slot('options')
            <option value="{{ $post->post_category ?? '' }}" selected>{{ $post->post_category ?? '' }}</option>
            <option value="GENERAL" selected>GENERAL</option>
            <option value="PRODUCT_FINDER"> PRODUCT FINDER </option>
            <option value="ACADEMY">ACADEMY</option>
        @endslot
@endcomponent



<!--##### UPDATE FILE UPLOAD #####-->
@component('form.upload')
    @slot('name') post_image @endslot
    @slot('id') post_image @endslot
        @slot('label') 
            Upload Post Image 
            {{-- IMAGE BOX STARTS --}}
                @if (empty($post->post_image))
                <img src = '{{ URL::asset('storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp")' height="55px">
                @else
                <img src = '{{ URL::asset('storage/app/post_image') }}/{{ $post->post_image }}?r=@php echo(rand()); @endphp")' height="55px">
                @endif
            {{-- IMAGE BOX ENDS --}}
        @endslot
    @slot('title') Upload @endslot
    @slot('value')@endslot
    @slot('icon') far fa-file-image @endslot
    @slot('hint')Upload File @endslot
    @slot('required')@endslot
@endcomponent


<!--##### TEXT POST SEQUENCE #####-->
@component('form.text')
    @slot('name') seq @endslot
    @slot('id') seq @endslot
    @slot('label') Post Sequence @endslot
    @slot('value'){{ $post->seq ?? '' }}@endslot
    @slot('placeholder') Enter Post Sequence @endslot
    @slot('icon') fas fa-sort-numeric-down @endslot
    @slot('hint') Allows you to re-arrange your post sequence. Change value only if you must re-order your post.@endslot
    @slot('maxlength') 200 @endslot
    @slot('required') required @endslot
@endcomponent


<!--##### CHECK BOX PUBLISH POST #####-->
@component('form.checkbox')
    @slot('name') publish_post @endslot
    @slot('id') publish_post @endslot
    @slot('label') Publish Post @endslot
    @slot('value') published @endslot
    @slot('info') Create & Publish this Post @endslot
    @slot('hint') @endslot
    @slot('required') @endslot
@endcomponent


<hr>


<!--##### SUBMIT BUTTON #####-->
@component('form.button')
    @slot('name') submit @endslot
    @slot('id') submit @endslot
    @slot('label') Update Post @endslot
    @slot('value') buttonx @endslot
    @slot('color') primary @endslot
    @slot('icon') fas fa-list @endslot
@endcomponent


</form>


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