<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SmartChurch</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">

    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">

  
    <!-- Css-->
    <link rel="stylesheet" href="{{asset("assets/css/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/fontawesome-all.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-select.min.css")}}">

    <link rel="stylesheet" href="{{asset("assets/css/jquery.mCustomScrollbar.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-datepicker.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/vegas.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/nouislider.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/nouislider.pips.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/jitsin_iconl.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/jquery.bxslider.css")}}">
    <!-- Template styles -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/responsive.css")}}">

</head>

<body>

    <div class="preloader">
        <img src="assets/images/loader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">



        <div class="site_header__header_three_wrap clearfix">

            <div class="site-header__header-one-wrap-left three">
                <a href="index.html" class="main-nav__logo">
                    <img src="assets/images/logo2.png" width="147" height="40" class="main-logo" alt="Smart Church">
                </a>
            </div>

            <header class="main-nav__header-one three">
                <nav class="header-navigation stricky three">
                    <div class="container-box clearfix">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="main-nav__left">
                            <a href="index.html" class="main-nav__logo">
                                <img src="assets/images/resources/logo.png" class="main-logo" alt="Awesome Image">
                            </a>
                            <a href="#" class="side-menu__toggler">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <div class="main-nav__main-navigation three">
                            <ul class=" main-nav__navigation-box">
                                <li class="dropdown current">
                                    <a href="index.html">Home</a>
                                   
                                </li>
                                <li class="dropdown">
                                    <a href="{{route('login')}}">Login</a>
                                </li>
                      
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->

                        <div class="main_nav_right_three">
                        
{{-- 
                            <div class="two__social">
                                <a href="#" class="tw-clr"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="fb-clr"><i class="fab fa-facebook-square"></i></a>
                                <a href="#" class="dr-clr"><i class="fab fa-dribbble"></i></a>
                                <a href="#" class="ins-clr"><i class="fab fa-instagram"></i></a>
                            </div> --}}

                        </div>

                    </div>
                </nav>
            </header>
        </div>




        <!--Three Icon Boxes Two Start-->
        {{-- <section class="three_icon_boxes_two">
            <div class="container-fulwidth">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <div class="three_icon_boxes_two_single thm-base">
                            <div class="three_icon_two-inner">
                                <div class="icon_box">
                                    <span class="icon-list"></span>
                                </div>
                                <div class="content_box">
                                    <p>Since Our Launch</p>
                                    <h3>17 Million People Have<br>Backed a Project</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="three_icon_boxes_two_single thm-black">
                            <div class="three_icon_two-inner">
                                <div class="icon_box">
                                    <span class="icon-progress"></span>
                                </div>
                                <div class="content_box">
                                    <p>Since Our Launch</p>
                                    <h3>$4.7 Billion Has Been<br>Pledged</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="three_icon_boxes_two_single thm-primary">
                            <div class="three_icon_two-inner">
                                <div class="icon_box">
                                    <span class="icon-money"></span>
                                </div>
                                <div class="content_box">
                                    <p>Since Our Launch</p>
                                    <h3>176,001 Projects Have<br>Been Funded</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!--Welcome One Start-->
        <section class="welcome_one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="welcome_left">
                            <div class="block-title text-left">
                                <div class="block_title_icon">
                                    <img src="assets/images/loader.png" alt="" width="25" height="25">
                                </div>
                                <p>Welcome To SmartChurch</p>
                                <h3>We Built SmartChurch to Increase Efficiency in Church Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="welcome_right">
                            <div class="welcome_text">
                                <p></p>
                            </div>
                            {{-- <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="welcome_img_box">
                                        <img src="assets/images/resources/welcom-one-img-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="welcome_img_box">
                                        <img src="assets/images/resources/welcom-one-img-2.jpg" alt="">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Why Choose Start-->
        {{-- <section class="why_choose_one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="why_choose_one_image">
                            <img src="assets/images/resources/why-choose-1-img-1.jpg" alt="">
                            <div class="why_choose_one_experience">
                                <div class="why_choose_one_experience_content">
                                    <div class="why_choose_one_icon">
                                        <img src="assets/images/resources/why-choose-1-icon.png" alt="">
                                    </div>
                                    <div class="why_choose_text">
                                        <h5>30 Years<br>Experience</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="why_choose_right">
                            <div class="block-title text-left">
                                <div class="block_title_icon">
                                    <img src="assets/images/icon/sec__title_two_icon.png" alt="">
                                </div>
                                <p>Why Choose Us?</p>
                                <h3>SmartChurch Benefits</h3>
                            </div>
                            <ul class="benefits_points list-unstyled">
                                <li>
                                    <div class="benefits_icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="benefits_content">
                                        <h4>Millions in Funding</h4>
                                        <p>Solution for small and large businesses lorem ipsum voluptatem accusantium
                                            simply free text doloremque laudantium.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefits_icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="benefits_content">
                                        <h4>Highest Success Rates</h4>
                                        <p>Solution for small and large businesses lorem ipsum voluptatem accusantium
                                            simply free text doloremque laudantium.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="benefits_icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="benefits_content">
                                        <h4>Dedicated 24/7 Support</h4>
                                        <p>Solution for small and large businesses lorem ipsum voluptatem accusantium
                                            simply free text doloremque laudantium.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

      
     
   
        <!--Three Boxes Start-->
        {{-- <section class="three_boxes">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--Three Boxes single-->
                        <div class="three_boxes_single wow fadeInUp animated" data-wow-delay="0.1s"
                            data-wow-duration="1200ms">
                            <div class="three_boxes_content">
                                <h3>Download the Guide</h3>
                                <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit.</p>
                            </div>
                            <div class="three_boxes_icon">
                                <img src="assets/images/resources/three-boxes-icon-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Three Boxes single-->
                        <div class="three_boxes_single wow fadeInUp animated" data-wow-delay="0.3s"
                            data-wow-duration="1200ms">
                            <div class="three_boxes_content">
                                <h3>Meet the Experts</h3>
                                <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit.</p>
                            </div>
                            <div class="three_boxes_icon">
                                <img src="assets/images/resources/three-boxes-icon-2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Three Boxes single-->
                        <div class="three_boxes_single wow fadeInUp animated" data-wow-delay="0.5s"
                            data-wow-duration="1200ms">
                            <div class="three_boxes_content">
                                <h3>Start Your Project</h3>
                                <p>Phaseus site amet tristique ligua donec iaculis leo sus cipit.</p>
                            </div>
                            <div class="three_boxes_icon">
                                <img src="assets/images/resources/three-boxes-icon-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!--Blog Three Start-->
        {{-- <section class="blog_three">
            <div class="blog_three_shape_one" style="background-image: url(assets/images/shapes/blog-3-shape-1.png)">
            </div>
            <div class="blog_three_shape_two" style="background-image: url(assets/images/shapes/blog-3-shape-2.png)">
            </div>
            <div class="container">
                <div class="block-title text-center">
                    <div class="block_title_icon">
                        <img src="assets/images/resources/blog-3-sec-title-icon.png" alt="">
                    </div>
                    <p>Latest News & Articles</p>
                    <h3>From the Blog</h3>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <!--Blog Three Single-->
                        <div class="blog_three-single wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="blog_three-img">
                                <img src="assets/images/blog/blog-3-img-1.jpg" alt="">
                            </div>
                            <div class="blog_three-content">
                                <ul class="list-unstyled blog-three__meta">
                                    <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_three_title">
                                    <h3><a href="news-detail.html">7Raise Money to Bring a Local Place to Life</a></h3>
                                </div>
                                <div class="blog_three_text">
                                    <p>Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus
                                        eros.</p>
                                </div>
                                <div class="blog_three_read_more">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Blog Three Single-->
                        <div class="blog_three-single wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="blog_three-img">
                                <img src="assets/images/blog/blog-3-img-2.jpg" alt="">
                            </div>
                            <div class="blog_three-content">
                                <ul class="list-unstyled blog-three__meta">
                                    <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_three_title">
                                    <h3><a href="news-detail.html">7Raise Money to Bring a Local Place to Life</a></h3>
                                </div>
                                <div class="blog_three_text">
                                    <p>Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus
                                        eros.</p>
                                </div>
                                <div class="blog_three_read_more">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <!--Blog Three Single-->
                        <div class="blog_three-single blog_three_last wow fadeInLeft" data-wow-delay="500ms"
                            data-wow-duration="1500ms">
                            <div class="blog_three-img">
                                <img src="assets/images/blog/blog-3-img-3.jpg" alt="">
                            </div>
                            <div class="blog_three-content">
                                <ul class="list-unstyled blog-three__meta">
                                    <li><a href="#"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <div class="blog_three_title">
                                    <h3><a href="news-detail.html">7Raise Money to Bring a Local Place to Life</a></h3>
                                </div>
                                <div class="blog_three_text">
                                    <p>Aelltes port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus
                                        eros.</p>
                                </div>
                                <div class="blog_three_read_more">
                                    <a href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!--Brand Three Start-->
        {{-- <section class="brand_three">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <!--Brand Three Single-->
                        <div class="brand_three_single">
                            <div class="brand_three_image">
                                <img src="assets/images/brand/brand-3-img-1.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <!--Brand Three Single-->
                        <div class="brand_three_single">
                            <div class="brand_three_image">
                                <img src="assets/images/brand/brand-3-img-2.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <!--Brand Three Single-->
                        <div class="brand_three_single">
                            <div class="brand_three_image">
                                <img src="assets/images/brand/brand-3-img-3.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <!--Brand Three Single-->
                        <div class="brand_three_single">
                            <div class="brand_three_image">
                                <img src="assets/images/brand/brand-3-img-4.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       --}}


    

        <!--Site Footer Bottom Start-->
        <div class="site-footer_bottom">
            <div class="container">
                <div class="site-footer_bottom_copyright">
                    <div class="site_footer_bottom_icon">
                        <img src="assets/images/loader.png" alt="">
                    </div>
                    <p>Copyright 2020 - 2021. <a href="#">SmartChurch</a></p>
                </div>
                <div class="site-footer__social">
                  
                </div>
            </div>
        </div>




    </div><!-- /.page-wrapper -->


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <div class="side-menu__block">
        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner ">
            <div class="side-menu__top justify-content-end">
                <a href="#" class="side-menu__toggler side-menu__close-btn"><img
                        src="assets/images/shapes/close-1-1.png" alt=""></a>
            </div><!-- /.side-menu__top -->

            <nav class="mobile-nav__container">
                <!-- content is loading via js -->
            </nav>

            <div class="side-menu__sep"></div><!-- /.side-menu__sep -->

            <div class="side-menu__content">
                <p><a href="mailto:needhelp@tripo.com">needhelp@jitsin.com</a> <br> <a href="tel:888-999-0000">888 999
                        0000</a></p>
                <div class="side-menu__social">
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </div>
    </div>


    <div class="search-popup">
        <div class="search-popup__overlay custom-cursor__overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <form action="#" class="search-popup__form">
                <input type="text" name="search" placeholder="Type here to Search....">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>



    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/js/waypoints.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.counterup.min.js")}}"></script>
    <script src="{{asset("assets/js/TweenMax.min.js")}}"></script>
    <script src="{{asset("assets/js/wow.js")}}"></script>
    <script src="{{asset("assets/js/jquery.magnific-popup.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.ajaxchimp.min.js")}}"></script>
    <script src="{{asset("assets/js/swiper.min.js")}}"></script>
    <script src="{{asset("assets/js/typed-2.0.11.js")}}"></script>
    <script src="{{asset("assets/js/vegas.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.validate.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-select.min.js")}}"></script>
    <script src="{{asset("assets/js/countdown.min.js")}}"></script>
    <script src="{{asset("assets/js/jquery.mCustomScrollbar.concat.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("assets/js/nouislider.min.js")}}"></script>
    <script src="{{asset("assets/js/isotope.js")}}"></script>
    <script src="{{asset("assets/js/jquery.bxslider.min.js")}}"></script>
    <script src="{{asset("assets/js/appear.js")}}"></script>


    <!-- template scripts -->
    <script src="{{asset("assets/js/theme.js")}}"></script>

</body>

</html>