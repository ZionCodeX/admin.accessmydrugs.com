
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SpreaditGlobal, Procurement & International Importation">

    <!-- ========== Page Title ========== -->
    <title>SpreaditGlobal - Procurement</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ url('assets/media/logos/spreadit-icon.png'); }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ url('assets2/css/bootstrap.min.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/font-awesome.min.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/flaticon-set.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/magnific-popup.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/owl.carousel.min.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/owl.theme.default.min.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/animate.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/bootsnav.css'); }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/style.css');  }}" rel="stylesheet" />
    <link href="{{ url('assets2/css/responsive.css'); }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav on no-full">

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav button">
                    <ul>
                        <li>
                            <a href="{{ route('register'); }}">try it free</a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brandx" href="{{ route('home'); }}">
                        <img src="{{ url('assets/media/logos/spreadit-logo2.png'); }}" style="padding: 3px;" height="60px" class="logo logo-scrolled" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li class="dropdown dropdown-right">
                            <a href="#home" class="smooth-menu" >Home</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#hiw">How it Works</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#testimonials">Testimonial</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#faq">FAQ</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#contact">contact</a>
                        </li>
                        <li class="dropdown dropdown-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#1da4e2">Register | Login</a>
                            <ul class="dropdown-menu">
                                <li><a target="_blank" href="{{ route('login'); }}">Login</a></li>
                                <li><a target="_blank" href="{{ route('register'); }}">Register</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Banner 
    ============================================= -->
    <div class="banner-area content-double shape-line bg-theme-small normal-text">
        <div class="box-table">
            <div class="box-cell">
                <div class="container">
                    <div class="row">
                        <div class="double-items">
                            <div class="col-lg-5 col-md-5 left-info simple-video">
                                <div class="content" data-animation="animated fadeInUpBig">
                                    <h1>We negotiate with  <span>Chinese Suppliers</span> on your behalf</h1>
                                    <p>
                                        Just tell us what you want, we handle the rest. 
                                    </p>
                                    <a class="btn circle btn-theme border btn-md" href="{{ route('register'); }}">Get Started</a>
                                    <a class="popup-youtube video-play-button" href="https://www.youtube.com/watch?v=ARUrVOFNQ9A">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 right-info">
                                <img src="{{ url('assets/media/images/spreadit-img.jpg'); }}" style="border-radius: 25px;" alt="Thumb">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wavesshape">
                    <img src="{{ url('assets2/img/waves-shape.svg'); }}" alt="Shape">
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start About 
    ============================================= -->
    <div id="hiw" class="about-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 default info">
                    <h4>What you get</h4>
                    <h2>Spreadit Procurement</h2>
                    <p>
                        SpreaditGlobal Procurement provides a very simple and intuitive approach to branding, buying and shipping products at the best price from China with the Guarantee of Quality Product, and Secured Delivery without worries. 
                    </p>
                    <a href="{{ route('register'); }}" class="btn circle btn-theme effect btn-md">Get Started</a>
                    <div class="bottom-info">
                        <h3>Why Choose Us</h3>
                        <ul>
                            <li>
                                <i class="fas fa-check"></i> <span>Get a quote in 1 business day. </span>
                            </li>
                            <li>
                                <i class="fas fa-check"></i> <span>Pay with card, Mobile Money, MPesa, PayPal, etc.</span>
                            </li>
                            <li>
                                <i class="fas fa-check"></i> <span>We brand your products in China.</span>
                            </li>
                            <li>
                                <i class="fas fa-check"></i> <span>We deliver to your doorstep.</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 services-info">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 equal-height">
                            <div class="item">
                                <i class="bi bi-file-earmark-text-fill"></i>
                                <h4>Get a quote</h4>
                                <p>
                                    Within 1 business day, you will get a quote from us after application. 
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 equal-height">
                            <div class="item">
                                <i class="bi bi-cash-coin"></i>
                                <h4>Payment Options</h4>
                                <p>
                                    More than a payment option, you can Pay with card, Mobile Money, MPesa, PayPal, etc.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 equal-height">
                            <div class="item">
                                <i class="bi bi-box-seam"></i>
                                <h4>Product Branding</h4>
                                <p>
                                   Brand your products with your specified brand right at production level. 
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 equal-height">
                            <div class="item">
                                <i class="bi bi-house-fill"></i>
                                <h4>Door Step Delivery</h4>
                                <p>
                                    We deliver right from China to your door step, at home or office.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

  


            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-6 col-md-6">
                            <p>&copy; Copyright 2021. All Rights Reserved by <a href="#">Directoreel</b></a></p>
                        </div>
                        <div class="col-lg-6 col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="https://www.directoreel.com/terms-and-conditions">Terms and Conditions</a>
                                </li>
                                <li>
                                    <a href="https://www.directoreel.com/terms-and-conditions">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ url('assets2/js/jquery-1.12.4.min.js'); }}"></script>
    <script src="{{ url('assets2/js/bootstrap.min.js'); }}"></script>
    <script src="{{ url('assets2/js/equal-height.min.js'); }}"></script>
    <script src="{{ url('assets2/js/jquery.appear.js'); }}"></script>
    <script src="{{ url('assets2/js/jquery.easing.min.js'); }}"></script>
    <script src="{{ url('assets2/js/jquery.magnific-popup.min.js'); }}"></script>
    <script src="{{ url('assets2/js/modernizr.custom.13711.js'); }}"></script>
    <script src="{{ url('assets2/js/owl.carousel.min.js'); }}"></script>
    <script src="{{ url('assets2/js/wow.min.js'); }}"></script>
    <script src="{{ url('assets2/js/count-to.js'); }}"></script>
    <script src="{{ url('assets2/js/bootsnav.js'); }}"></script>
    <script src="{{ url('assets2/js/main.js'); }}"></script>

</body>
</html>