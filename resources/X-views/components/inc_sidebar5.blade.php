<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav" style='background-color:#032f5a;'>
           

          
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('dashboard') }}" class="menu-link">
                  <span class="svg-icon menu-icon">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                    <span class="svg-icon menu-icon"
                    ><i class="fa fa-box"></i
                  ></span>
                    <!--end::Svg Icon-->
                  </span>
                  <span class="menu-text"><b>SGP-ADMIN</b></span>
                </a>
              </li>
      
      
              <li class="menu-section">
                <h4 class="menu-text">PROCUREMENT  &nbsp; <small></small></h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
              </li>
      
      
      
      
      <!------------------------------REQUEST QUOTES------------------------------>  
              <li
                class="menu-item menu-item-submenu"
                aria-haspopup="true"
                data-menu-toggle="hover"
              >
                <a href="{{ route('request_quotes_create_index'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span class="svg-icon menu-icon"><i class="fas fa-file-signature" style="color:#99ccff;" ></i></span>
                  <span class="menu-text"><b>Tell us what you want</b></span>
                </a>
              </li>
      
      
      
      
      <!------------------------------PENDING REQUESTS------------------------------>
              <li
                class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
                aria-haspopup="true"
                data-menu-toggle="hover"
              >
      
                <a href="{{ route('request_pending_view_index'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span class="svg-icon menu-icon"><i class="far fa-list-alt" style="color:#99ccff;" ></i></span>
                  <span class="menu-text">Pending Requests</span>
                  @if($request_count > 0)
                    <span class="label label-rounded label-primary">{{ $request_count ?? 0 }}</span>
                  @endif
                </a>
      
              </li>
      
 

       <!------------------------------GENERATED QUOTES------------------------------>
              <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                <span class="svg-icon menu-icon"><i class="fas fa-file-invoice" style="color:#99ccff;" ></i></span>
                <span class="menu-text">Generated Quotes</span>

              </a>
            </li>
          




            <!------------------------------GENERATED INVOICES------------------------------>
            <li
            class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
            aria-haspopup="true"
            data-menu-toggle="hover"
          >
            <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
              <span class="svg-icon menu-icon"><i class="fas fa-file-invoice-dollar" style="color:#99ccff;" ></i></span>
              <span class="menu-text">Payment Invoices</span>

            </a>
          </li>


          <!------------------------------PAYMENT VERIFICATION------------------------------>
          <li
          class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
          aria-haspopup="true"
          data-menu-toggle="hover"
        >
          <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
            <span class="svg-icon menu-icon"><i class="fas fa-money-check-alt" style="color:#99ccff;" ></i></span>
            <span class="menu-text">Payment Status</span>

          </a>
        </li>
      
<hr>

        <!------------------------------PROCESSING ORDERS------------------------------>
            <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
              <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                <span class="svg-icon menu-icon"><i class="fas fa-laptop" style="color:#99ccff;" ></i></span>
                <span class="menu-text">Processing Orders</span>

              </a>
            </li>
      
      
      
          <!------------------------------SHIPPED ORDERS------------------------------>
              <li
                class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
                aria-haspopup="true"
                data-menu-toggle="hover"
              >
      
                <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span class="svg-icon menu-icon"><i class="fas fa-plane-departure" style="color:#99ccff;" ></i></span>
                  <span class="menu-text">Shipped Orders</span>

                </a>
      
              </li>
      
      
      
      
          <!------------------------------ARRIVED ORDERS------------------------------>
              <li
                class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
                aria-haspopup="true"
                data-menu-toggle="hover"
              >
      
                <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span class="svg-icon menu-icon"><i class="fas fa-plane-arrival" style="color:#99ccff;" ></i></span>
                  <span class="menu-text">Arrived Orders</span>

                </a>
      
              </li>
      
      
          <!------------------------------DELIVERED ORDERS------------------------------>
              <li
                class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
                aria-haspopup="true"
                data-menu-toggle="hover"
              >
      
                <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span class="svg-icon menu-icon"><i class="fas fa-box" style="color:#99ccff;" ></i></span>
                  <span class="menu-text">Delivered Orders</span>

                </a>

              </li>
      
      
             <!------------------------------COMPLETED ORDERS------------------------------>
             <li
             class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
             aria-haspopup="true"
             data-menu-toggle="hover"
           >
   
             <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
               <span class="svg-icon menu-icon"><i class="fas fa-box-open" style="color:#99ccff;" ></i></span>
               <span class="menu-text">Completed Orders</span>

             </a>

           </li>
           
           <hr>

              <!------------------------------QUOTES ON-HOLD------------------------------>
              <li
              class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
              aria-haspopup="true"
              data-menu-toggle="hover"
            >
    
              <a href="{{ route('not_available'); }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                <span class="svg-icon menu-icon"><i class="fas fa-file-pdf" style="color:#99ccff;" ></i></span>
                <span class="menu-text">Quotes On-Hold</span>

              </a>

            </li>
      


      
      
      
      
      
              <li class="menu-section" style='background-color:##F3F6F9;'>
                <h4 class="menu-text">SETTINGS</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
              </li>
      
      
          <!------------------------------PROFILE------------------------------>
              <li
                class="menu-item menu-item-submenu menu-item-openXIS-REMOVE menu-item-here"
                aria-haspopup="true"
                data-menu-toggle="hover"
              >
                <a href="{{ route('profile_update') }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span class="svg-icon menu-icon"><i class="fa fa-user" style="color: #99ccff"></i></span>
                  <span class="menu-text">Profile</span>
                  <i class="menu-arrow" style="color: #99ccff"></i>
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
                        <span class="menu-text">Profile Update</span>
                      </a>
                    </li>
                    <li class="menu-item" aria-haspopup="true">
                      <a href="{{ route('password_reset') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-dot">
                          <span></span>
                        </i>
                        <span class="menu-text">Password Reset</span>
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
                <a href="{{ route('logout') }}" class="menu-link menu-toggle" style='background-color:#032f5a;'>
                  <span style="color: #99ccff" class="svg-icon menu-icon"
                    ><i style="color: #99ccff" class="fa fa-power-off"></i
                  ></span>
                  <span class="menu-textx">Logout</span>
                </a>
              </li>

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>