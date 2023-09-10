
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
            <div class="box-cell" style="padding-top: 25px; margin: 5px;">
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
                        SpreaditGlobal Procurement provides a very simple and intuitive approach to sourcing, branding, and shipping products at the best prices from China with a guarantee of quality products and timely delivery.
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
                                    Within 1 business day, you will get a quote from us after requesting for a quote.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 equal-height">
                            <div class="item">
                                <i class="bi bi-cash-coin"></i>
                                <h4>Payment Options</h4>
                                <p>
                                    Wherever you are, you can pay for your import order. Pay with Card, Mobile Money, MPesa, PayPal, etc.
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
                                    We deliver from China to your door step; at home or office.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Companies Area 
    ============================================= -->
    <!--<div class="companies-area default-padding bg-theme-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 info">
                    <h4>Trusted by the world's best companies</h4>
                    <p>
                        Here are some of the companies and happy clients we've been doing business with.
                    </p>
                </div>
                <div class="col-lg-8 col-md-8 clients">
                    <div class="clients-items owl-carousel owl-theme text-center">
                        <div class="single-item">
                            <a href="#"><img src="{{ url('assets2/img/150x80.png'); }}" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{ url('assets2/img/150x80.png'); }}" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{ url('assets2/img/150x80.png'); }}" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{ url('assets2/img/150x80.png'); }}" alt="Clients"></a>
                        </div>
                        <div class="single-item">
                            <a href="#"><img src="{{ url('assets2/img/150x80.png'); }}" alt="Clients"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- End Companies Area -->



    

    <!-- Start Testimonials 
    ============================================= -->
    <div id="testimonials" class="testimonials-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading single text-center">
                        <h2>Our Customer's Review</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="testimonial-items text-center">
                        <div class="carousel slide" data-ride="carousel" data-interval="500000" id="testimonial-carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <span class="quote"></span>
                                    <p>
                                        The simplest and most intuitive way to procure products with specifications from China.
                                    </p>
                                    <h4>Atsu Emmanuel</h4>
                                    <span>Mini Importer</span>
                                </div>
                                <div class="item">
                                    <span class="quote"></span>
                                    <p>
                                        Simply make procurements and go to bed without fear.
                                    </p>
                                    <h4>Emeka Agwu</h4>
                                    <span>Business Man</span>
                                </div>
                                <div class="item">
                                    <span class="quote"></span>
                                    <p>
                                       They are simply Professionals in their business.
                                    </p>
                                    <h4>Paul Drake</h4>
                                    <span>Electric Systems Supplier</span>
                                </div>
                            </div>
                            <!-- End Carousel Content -->

                            <!-- Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#testimonial-carousel" data-slide-to="0" class="active">
                                    <img src="assets2/img/atsu_emmanuel.jpg" alt="Thumb">
                                </li>
                                <li data-target="#testimonial-carousel" data-slide-to="1">
                                    <img src="assets2/img/img1.jpg" alt="Thumb">
                                </li>
                                <li data-target="#testimonial-carousel" data-slide-to="2">
                                    <img src="assets2/img/img2.jpg" alt="Thumb">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Start Subscribe 
    ============================================= -->
    <div class="subscribe-area bg-fixed shadow dark text-light default-padding text-center" style="background-image: url(assets2/img/img4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
                    <h3>STAY UPDATED WITH US</h3>
                    <p>
                        Get the latest reports or news about spreaditglobal and the world of procurement.
                    </p>
                    <div class="subscribe">
                        <form action="#">
                            <div class="input-group stylish-input-group">
                                <input type="email" placeholder="Enter your e-mail here" class="form-control" name="email">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>  
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

    <!-- Start Contact Area  
    ============================================= -->
    <div id="contact" class="contact-us-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Contact Us</h2>
                        <p>
                            Want to reach us?
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 address">
                    <div class="address-items">
                        <h4>Office Address</h4>
                        <ul class="info">
                            <li>
                                <i class="fas fa-map-marked-alt"></i> 
                                <span>NO 5 Olutosin Ajayi St,<br> Ajao Estate, Lagos.</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i> 
                                <span>(+234)-806-458-3664<br>
                                    (+234)-806-839-7263<br></span>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open"></i> 
                                <span>admin@spreaditglobal.com</span>
                            </li>
                        </ul>
                        <h4>Social Address</h4>
                        <ul class="social">
                            <li class="facebookx">
                                <a target="_blank" href="https://www.facebook.com/spreaditng"><img src="{!! url('assets/media/logos/facebook.png'); !!}" /></a>
                            </li>
                            <li class="twitterx">
                                <a target="_blank" href="https://twitter.com/spreaditng"><img src="{!! url('assets/media/logos/twitter.png'); !!}" /></a>
                            </li>
                            <li class="linkedinx">
                                <a target="_blank" href="https://www.linkedin.com/company/spreadit-limited"><img src="{!! url('assets/media/logos/linkedin.png'); !!}" /></a>
                            </li>
                            <li class="instagramx">
                                <a target="_blank" href="https://www.instagram.com/spreaditworld/"><img src="{!! url('assets/media/logos/instagram.png'); !!}" /></a>
                            </li>
                            <li class="youtubex">
                                <a target="_blank" href="https://www.youtube.com/c/Spreaditng"><img src="{!! url('assets/media/logos/youtube.png'); !!}" /></a>
                            </li>
                        </ul>
                        <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 contact-form">
                    <h2>Leave us a Message</h2>
                    <form action="assets2/mail/contact.php" method="POST" class="contact-form">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <button type="submit" name="submit" id="submit">
                                    Send Message <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->
                        <div class="col-lg-12 col-md-12 alert-notification">
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    

    <!-- Start Faq  
    ============================================= -->
    <div id="faq" class="faq-area bg-gray default-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Answers & Questions</h2>
                        <p>
                            Have any frequently asked questions?
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 thumb">
                    <img src="assets2/img/img4.jpg" style="border-radius: 25px;" alt="Thumb">
                </div>
                <div class="col-lg-6 col-md-6 faq-items default-padding-bottom">
                    <!-- Start Accordion -->
                    <div class="acd-items acd-arrow">
                        <div class="panel-group symb" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                            What is SpreaditGlobal Procurement? 
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>
                                            SpreaditGlobal Procuremet assists corporate companies or individual who buy a lot of products from China. If you wish to buy small items or have links from 1688.com or other China websites, then go <a href="https://dashboard.spreaditglobal.com/signup/home/signup"><b>here</b>.</a><br>
                                            
                                        </p>
                                        <p>
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                            How long will the entire process take.
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            The entire process takes about 2 Weeks for orders not requiring branding and which are shipped by air. For very large orders and which also require branding, it can take a longer time. Also, if you wish to ship by sea, it takes longer.
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                            How do I know my Items have arrive?
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            How do I know when my
                                        </p>
                                        <p>
                                             He in just mr door body held john down he. So journey greatly or garrets. Draw door kept do so come on open mean. Estimating stimulated how reasonably precaution diminution she simplicity sir but. Questions am sincerity zealously concluded consisted or no gentleman it. 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                            Where do I start? 
                                        </a>
                                    </h4>
                                </div>
                                <div id="ac4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                            Simply click on Get Started.
                                        </p>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Faq  -->

    <!-- Start Footer 
    ============================================= -->
    <footer class="default-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-lg-3 col-md-3 col-sm-6 equal-height item">
                        <div class="f-item">
                            <img src="{{ url('assets/media/logos/spreadit-logo2.png'); }}" height="55px" alt="Logo">
                            <p>
                                SpreaditGlobal Procurement provides a very simple and intuitive approach to sourcing, branding, and shipping products at the best prices from China with a guarantee of quality products and timely delivery.
                            </p>
                            <a href="{{ route('register'); }}" class="btn circle btn-theme effect btn-sm">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 equal-height item">
                        <div class="f-item link">
                            <h4>Quick LInk</h4>
                            <ul>
                                <li class="dropdown">
                                    <a href="#home" class="smooth-menu" ><i class="fas fa-angle-right"></i> Home</a>
                                </li>
                                <li>
                                    <a class="smooth-menu" href="#hiw"><i class="fas fa-angle-right"></i> How it Works</a>
                                </li>
                                <li>
                                    <a class="smooth-menu" href="#testimonials"><i class="fas fa-angle-right"></i> Testimonial</a>
                                </li>
                                <li>
                                    <a class="smooth-menu" href="#faq"><i class="fas fa-angle-right"></i> FAQ</a>
                                </li>
                                <li>
                                    <a class="smooth-menu" href="#contact"><i class="fas fa-angle-right"></i> Contact</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 equal-height item">
                        <div class="f-item link">
              
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 equal-height item">
                        <div class="f-item twitter-widget">
                            <h4>Contact Info</h4>
                            <p>
                                Our Contact details below
                            </p>
                            <div class="address">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-home"></i> 
                                        </div>
                                        <div class="info">
                                            <h5>Website:</h5>
                                            <span>https://procurement.spreaditglobal.com</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i> 
                                        </div>
                                        <div class="info">
                                            <h5>Email:</h5>
                                            <span>admin@spreaditglobal.com</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone"></i> 
                                        </div>
                                        <div class="info">
                                            <h5>Phone:</h5>
                                            <span>(+234)-806-458-3664</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="col-lg-6 col-md-6">
                            <p>&copy; Copyright 2021. All Rights Reserved by <a href="#">Spreadit Limited | <b>Procurement</b></a></p>
                        </div>
                        <div class="col-lg-6 col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="https://www.spreaditglobal.com/terms-and-conditions">Terms and Conditions</a>
                                </li>
                                <li>
                                    <a href="https://www.spreaditglobal.com/terms-and-conditions">Privacy Policy</a>
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


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5aa93e7b4b401e45400dbb12/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
        

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