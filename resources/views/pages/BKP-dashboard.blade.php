
@extends('layouts.base')


@section('title', 'Dashboard')


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
    <div class="alert-text">Info | <small class="secondary"> No general info available for now</small></div>
  </div>


    <!---------------------------------------------------------->
    <div class="card card-custom gutter-b">
        <div class="card-header">
         <div class="card-title">
          <h3 class="card-label">
           News Feed
           <small></small>
          </h3>
         </div>
        </div>
        <div class="card-body">
  <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
  

  
                          <!--begin::Container-->
                          <div class="row">


                            <div class="col-lg-4">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">Kate Henshaw @ 50: Garlands for timeless diva<br><small>By <b>Admin</b></small></h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="bgi-no-repeat rounded min-h-100px" style="width: 100%;" src="{{ url('assets/media/news_feed/kate-hensha.jpg'); }}">
                                        <hr>
                                        <p>There was wild excitement when news broke that Nollywood actress Kate Henshaw turned 50 on Monday. Garlands poured in from home and abroad for the timeless diva whose relevance has refused to patter off.</p>
                                        <p><a href="">Read more...</a></p>
                                    </div>
                                    
                                </div>
                                <!--end::Card-->
                            </div>



                            <div class="col-lg-4">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">From Nollywood to Oscars: Naija list of academy members swell<br><small>By <b>Cryptosx</b></small></h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="bgi-no-repeat rounded min-h-100px" style="width: 100%;" src="{{ url('assets/media/news_feed/ramsey-noah.jpg'); }}">
                                        <hr>
                                        <p>The Academy of Motion Picture of Arts and Science or Oscars for short has once again turned the spotlight on Nigeria and its massive movie industry—Nollywood..</p>
                                        <p><a href="">Read more...</a></p>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>



                            <div class="col-lg-4">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">Another cap that fits for Segun ‘The Voice’ Arinze<br><small>By <b>Walexy</b></small></h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="bgi-no-repeat rounded min-h-100px" style="width: 100%;" src="{{ url('assets/media/news_feed/segun-arinze.jpg'); }}">
                                        <hr>
                                        <p>It didn’t come as a surprise to many when news broke that notable Nollywood actor Segun Arinze has been elected President of the Association of Voice-Over Artistes, Nigeria (AVOA).</p>
                                        <p><a href="">Read more...</a></p>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>

                        </div>
                        <!--end::Container-->
  
  
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