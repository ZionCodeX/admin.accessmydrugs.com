
@extends('layouts.base')


@section('title', 'Profile Update')


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
        <div class="alert-text">Dashboard | <small class="secondary"> Member Dashboard</small></div>
      </div>

    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header" style="">
          <div class="card-title">
            <h3 class="card-label">Sticky Form Actions 
            <i class="mr-2"></i>
            <small class="">try to scroll the page</small></h3>
          </div>
          <div class="card-toolbar">
            <a href="{{ url()->previous() }}" class="btn btn-light-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
              <button type="button" class="btn btn-primary font-weight-bolder">
              <i class="far fa-save"></i>Save Form</button>
              <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            </div>
          </div>
        </div>
        <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->

<div class="col-xl-12">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_1">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                    <i class="fas fa-house-user"></i>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text">Account Data</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                    <i class="fa fa-user"></i>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text">Personal Profile</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                    <i class="fas fa-hat-cowboy"></i>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text">Actors Profile </span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_4">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                    <i class="fas fa-kiss-beam"></i>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text">Models Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--end::Header-->







        <!--begin::Body-->
        <div class="card-body px-0">
            <div class="tab-content pt-5">


                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                    <div class="container">
                        CONTENT 1
                    </div>
                </div>
                <!--end::Tab Content-->


                <!--begin::Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                    <div class="container">
                        CONTENT 2
                    </div>
                </div>
                <!--end::Tab Content-->


                <!--begin::Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_3" role="tabpanel">
                    <div class="container">
                        CONTENT 3
                    </div>
                </div>
                <!--end::Tab Content-->


                <!--begin::Tab Content-->
                <div class="tab-pane" id="kt_apps_contacts_view_tab_4" role="tabpanel">
                    <div class="container">
                        CONTENT 4
                    </div>
                </div>
                <!--end::Tab Content-->
            </div>
        </div>
        <!--end::Body-->





    </div>
    <!--end::Card-->
</div>





 
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