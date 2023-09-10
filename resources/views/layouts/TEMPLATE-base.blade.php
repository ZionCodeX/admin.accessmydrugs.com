<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">

  

<!-- BEGIN: Head-->
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="MSL Multi-Connector Management Application">
        <meta name="keywords" content="MSL Multi-Connector Management Application">
        <meta name="author" content="Microwaresolutions Ltd">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - MS-Multi-Connector Management Application </title>

        <!----- HEADER LINKS ----->
        @section('header_links')
            @yield('header_links')
            @include('components/inc_header_links')
        @show

    </head>






<!-- BEGIN: Body-->
<body class="">



        <!----- NAV BAR ----->
        @section('navbar')
            @yield('navbar')
        @show




        <!----- SIDE BAR ----->
        @section('sidebar')
            @include('components/inc_sidebar')
        @show




         
        <!----- MAIN BODY CONTENT ----->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">

              <!----- ALERT MESSAGES ----->
              @section('alert_messages')
                  @include('components/inc_alert_messages')
              @show

      <!--<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title  ?? 'Dashboard' }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div>
        </div>
      </div>--><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
 
            <div class="body-content">
                @yield('content')
            </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->

</div>
<!-- /.content-wrapper -->



        <!----- FOOTER CONTENT ----->
        @section('footer')
            @yield('footer')
            @include('components/inc_footer_content')
        @show




        <!----- FOOTER SCRIPTS ----->
        @section('footer_scripts')
            @yield('footer_scripts')
            @include('components/inc_footer_links')
        @show



    </body>

</html>