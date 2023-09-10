<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">{{ Str::upper(auth()->user()->company_name) }}
        <small class="text-muted font-size-sm ml-2"> ( AMD - {{ Str::upper(auth()->user()->account_type) }} )</small></h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">

                {{-- IMAGE BOX START --}}
                    @if (empty(auth()->user()->profile_image))
                        <div class="symbol-label" style='background-image:url("{{ URL::asset('storage/app/image/default-user.jpg') }}?r=@php echo(rand()); @endphp")'></div>
                    @else
                        <div class="symbol-label" style='background-image:url("{{ URL::asset('storage/app/profile_image') }}/{{ auth()->user()->profile_image }}?r=@php echo(rand()); @endphp")'></div>
                    @endif
                {{-- IMAGE BOX ENDS --}}

                    <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Str::ucfirst(auth()->user()->first_name) }} {{ Str::ucfirst(auth()->user()->last_name) }}</a>
                <div class="text-muted mt-1">{{ Str::ucfirst(auth()->user()->profession) }}</div>
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                    <span class="svg-icon menu-icon"><i class="far fa-envelope"></i></span>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary">{{ Str::lower(auth()->user()->email) }}</span>
                        </span>
                    </a>
                    <a href="{{ route('logout'); }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="{{ route('profile_update_index') }}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <span class="svg-icon svg-icon-md svg-icon-success">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                <span class="svg-icon menu-icon"><i class="far fa-list-alt"></i></span>
                                <!--end::Svg Icon-->
                            </span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">My Profile</div>
                        <div class="text-muted">Account settings and more
                        <span class="label label-light-danger label-inline font-weight-bold">update</span></div>
                    </div>
                </div>
            </a>
            <!--end:Item-->


        </div>
        <!--end::Nav-->




        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->




        <!--begin::Notifications-->
        <div>
            <!--begin:Heading-->
            <h5 class="mb-5">Recent Notifications</h5>
            <!--end:Heading-->


            <!--begin::Item-->
            <div class="d-flex align-items-center bg-light-warning rounded p-5 gutter-b">
                <span class="svg-icon svg-icon-warning mr-5">
                    <span class="svg-icon svg-icon-lg">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                        <span class="svg-icon menu-icon"><i class="far fa-window-maximize"></i></span>
                        <!--end::Svg Icon-->
                    </span>
                </span>
                <div class="d-flex flex-column flex-grow-1 mr-2">
                    <a href="{{ route('dashboard') }}" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">Welcome to Access My Drugs</a>
                    <span class="text-muted font-size-sm">Today</span>
                </div>
                <span class="font-weight-bolder text-warning py-1 font-size-lg">1</span>
            </div>
            <!--end::Item-->
        




        </div>
        <!--end::Notifications-->
    </div>
    <!--end::Content-->
</div>