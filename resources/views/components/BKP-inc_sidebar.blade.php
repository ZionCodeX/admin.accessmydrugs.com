<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
  <!--begin::Menu Container-->
  <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
      <!--begin::Menu Nav-->
      <ul class="menu-nav">
         
          <li class="menu-item" aria-haspopup="true">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <span class="svg-icon menu-icon">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                  <span class="svg-icon menu-icon"
                  ><i class="fa fa-user"></i
                ></span>
                  <!--end::Svg Icon-->
                </span>
                <span class="menu-text"><b>{{ Str::upper(auth()->user()->stage_name) }}</b></span>
              </a>
            </li>
    
    
    
    
          
            <li class="menu-section">
              <h4 class="menu-text">FEATURES : &nbsp; <small>({{ Str::upper(auth()->user()->company_name) }})</small></h4>
              <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
    
    
    
    
    <!------------------------------NEWS FEEDS (BLOG)------------------------------>  
            <li
              class="menu-item menu-item-submenu"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('dashboard') }}" class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"
                  ><i class="fa fa-newspaper"></i
                ></span>
                <span class="menu-text">News Feeds</span>
              </a>
            </li>
    
    
    
    
    <!------------------------------FORUM------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
    
              <a class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="fa fa-users"></i></span>
                <span class="menu-text">General Forum</span>
                <i class="menu-arrow"></i>
              </a>
    
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
    
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Create Topic</span>
                    </a>
                  </li>
    
                                <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">View General Forum</span>
                    </a>
                  </li>
    
                </ul>
              </div>
            </li>
    
    
    
        <!------------------------------MENTORSHIP FORUM------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
    
              <a class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="fab la-fort-awesome"></i></span>
                <span class="menu-text">Mentorship Forum</span>
                <i class="menu-arrow"></i>
              </a>
    
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
    
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Mentorship Forum</span>
                    </a>
                  </li>
    
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Create Forum Thread</span>
                    </a>
                  </li>
    
                </ul>
              </div>
            </li>
    
    
    
        <!------------------------------SCRIPTS------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
    
              <a class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="fa fa-clipboard"></i></span>
                <span class="menu-text">Scripts</span>
                <i class="menu-arrow"></i>
              </a>
    
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
    
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Purchase Scripts </span>
                    </a>
                  </li>
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Sell Scripts &nbsp<small>(Prem)</small></span>
                    </a>
                  </li>
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">My Scripts</span>
                    </a>
                  </li>
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Purchased Scripts</span>
                    </a>
                  </li>
    
                </ul>
              </div>
            </li>
    
    
    
    
        <!------------------------------AUDITION------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
    
              <a class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="fa fa-edit"></i></span>
                <span class="menu-text">Audition</span>
                <i class="menu-arrow"></i>
              </a>
    
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
    
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Call for Audition</span>
                    </a>
                  </li>
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">View Audition</span>
                    </a>
                  </li>
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Apply for Audition</span>
                    </a>
                  </li>
    
                </ul>
              </div>
            </li>
    
    
    
    
        <!------------------------------CREW------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
    
              <a class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="fab fa-searchengin"></i></span>
                <span class="menu-text">Crew</span>
                <i class="menu-arrow"></i>
              </a>
    
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
    
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Hire Crew</span>
                    </a>
                  </li>
    
                  <li class="menu-item" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">View Hire Request</span>
                    </a>
                  </li>
    
    
                </ul>
              </div>
            </li>
    
    
    
    
        <!------------------------------CV DOWNLOAD------------------------------>
            <li
              class="menu-item menu-item-submenu"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('dashboard') }}" class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="far fa-file-pdf"></i></span>
                <span class="menu-text">Download CV</span>
              </a>
            </li>
    
    
    
    
    
            <li class="menu-section" style='background-color:##F3F6F9;'>
              <h4 class="menu-text">SETTINGS</h4>
              <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
    
    



        <!------------------------------SWITCH ACCOUNT------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('dashboard') }}" class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="fa fa-users"></i></span>
                <span class="menu-text">Switch Account</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">{{ Str::upper(auth()->user()->profession) }}</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
    
    
    

        <!------------------------------PROFILE------------------------------>
        <li
        class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
        aria-haspopup="true"
        data-menu-toggle="hover"
      >
        <a href="{{ route('profile_update_index') }}" class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
          <span class="svg-icon menu-icon"><i class="fa fa-user"></i></span>
          <span class="menu-text">Profile</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
          <i class="menu-arrow"></i>
          <ul class="menu-subnav">
            <li
              class="menu-item menu-item-activeXIS-REMOVE"
              aria-haspopup="true"
            >
              <a href="{{ route('profile_update_index') }}" class="menu-link">
                <i class="menu-bullet menu-bullet-dot">
                  <span></span>
                </i>
                <span class="menu-text">Update Profile</span>
              </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-bullet menu-bullet-dot">
                  <span></span>
                </i>
                <span class="menu-text">Password Reset</span>
              </a>
            </li>
          </ul>
        </div>
      </li>





    
    
          <!------------------------------USER STATUS------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('dashboard') }}" class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"><i class="far fa-gem"></i></span>
                <span class="menu-text">Status Upgrade</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="menu-submenu">
                <i class="menu-arrow"></i>
                <ul class="menu-subnav">
                
                  <li
                    class="menu-item menu-item-activeXIS-REMOVE"
                    aria-haspopup="true"
                  >
                    <a href="{{ route('dashboard') }}" class="menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">Upgrade Status</span>
                    </a>
                  </li>
    
                </ul>
              </div>
            </li>      
    
    
    
    
    <!------------------------------LOGOUT------------------------------>
            <li
              class="menu-item menu-item-submenu"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('logout') }}" class="menu-link menu-toggle" style='background-color:#F3F6F9;'>
                <span class="svg-icon menu-icon"
                  ><i class="fa fa-power-off"></i
                ></span>
                <span class="menu-text">Logout</span>
              </a>
            </li>

      </ul>
      <!--end::Menu Nav-->
  </div>
  <!--end::Menu Container-->
</div>