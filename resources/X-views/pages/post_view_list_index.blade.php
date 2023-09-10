
@extends('layouts.base')


@section('title', 'View NewsFeed List Post')


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
            <h3 class="card-label">View NewsFeed Posts
            <i class="mr-2"></i>
            <small class=""> View Posts</small></h3>
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

<div class="card card-custom card-stretch" id="kt_page_stretched_card">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ $post->post_title ?? '' }} | <small>{{ $post->post_author_name ?? '' }} | {{ $post->updated_at ?? '' }}</small></h3>
        </div>
    </div>
    <div class="card-body">
        <div class="card-scrollx">
                    <style>
                        .imgx{
                            height: 300px;
                            width: 70%;
                            object-fit: cover;
                            border-radius: 30px;
                            }
                    </style>			
                    {{-- IMAGE BOX STARTS --}}
                        @if (empty($post->post_image))
                        <img class="imgx" src = '{{ URL::asset('storage/app/image/default-image.jpg') }}?r=@php echo(rand()); @endphp")' height="165px">
                        @else
                        <img class="imgx" src = '{{ URL::asset('storage/app/post_image') }}/{{ $post->post_image }}?r=@php echo(rand()); @endphp")' height="165px">
                        @endif
                    {{-- IMAGE BOX ENDS --}}
                    <hr>
            {!! $post->post_article ?? '' !!}
            <hr>
            TAGS: <b>{!! $post->post_tags ?? '' !!}</b>
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