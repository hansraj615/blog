<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Cocoon -Portfolio">
    <meta name="keywords" content="Cocoon , Portfolio">
    <meta name="author" content="Pharaohlab">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> Cocoon -Portfolio</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
   <!-- Bootstrap CSS -->
   <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
   <!-- Fonts Icon CSS -->
   <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
   <link href="{{asset('frontend/css/et-line.css')}}" rel="stylesheet">
   <link href="{{asset('frontend/css/ionicons.min.css')}}" rel="stylesheet">
   <!-- Carousel CSS -->
   <link href="{{asset('frontend/css/slick.css')}}" rel="stylesheet">
   <!-- Magnific-popup -->
   <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
   <!-- Animate CSS -->
   <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
   <!-- Custom styles for this template -->
   <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
</head>
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<div class="body-container container-fluid">
    <a class="menu-btn" href="javascript:void(0)">
        <i class="ion ion-grid"></i>
    </a>
    <div class="row justify-content-center">
        <!--=================== side menu ====================-->
        <div class="col-lg-2 col-md-3 col-12 menu_block">

            <!--logo -->
            <div class="logo_box">
                <a href="#">
                    <img src="{{asset('frontend/img/logo.png')}}" alt="cocoon">
                </a>
            </div>
            <!--logo end-->

            <!--main menu -->
            <div class="side_menu_section">
                <ul class="menu_nav">
                    <li class="{{Request::is('index*')?'active':''}}">
                        <a href="{{route('showIndex')}}">
                            Home
                        </a>
                    </li>
                    <li class="{{Request::is('about*')?'active':''}}">
                        <a href="{{route('showAbout')}}">
                            About Us
                        </a>
                    </li>
                    <li class="{{Request::is('Gallery*')?'active':''}}">
                        <a href="services.html">
                            Gallery
                        </a>
                    </li>
                    <li class="{{Request::is('portfolio*')?'active':''}}">
                        <a href="portfolio.html">
                            Portfolio
                        </a>
                    </li>
                    <li class="{{Request::is('blog*')?'active':''}}">
                        <a href="blog.html">
                            Blog
                        </a>
                    </li>
                    <li class="{{Request::is('contact*')?'active':''}}">
                        <a href="contact.html">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->

            <!--filter menu -->
            <div class="side_menu_section">
                <h4 class="side_title">filter by:</h4>
                <ul  id="filtr-container"  class="filter_nav">
                    <li  data-filter="*" class="active"><a href="javascript:void(0)" >all</a></li>
                    <li data-filter=".branding"> <a href="javascript:void(0)">branding</a></li>
                    <li data-filter=".design"><a href="javascript:void(0)">design</a></li>
                    <li data-filter=".photography"><a href="javascript:void(0)">photography</a></li>
                    <li data-filter=".architecture"><a href="javascript:void(0)">architecture</a></li>
                </ul>
            </div>
            <!--filter menu end -->

            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <ul class="social_menu">
                        <li>
                            <a href="#"> <i class="ion ion-social-pinterest"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-facebook"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-twitter"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-dribbble"></i> </a>
                        </li>
                    </ul>
                    <div class="copy_right">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->
        @yield('content')
        
    </div>
</div>


<!-- jquery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('frontend/js/popper.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<!--slick carousel -->
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!--Portfolio Filter-->
<script src="{{asset('frontend/js/imgloaded.js')}}"></script>
<script src="{{asset('frontend/js/isotope.js')}}"></script>
<!-- Magnific-popup -->
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<!--Counter-->
<script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
<!-- WOW JS -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>