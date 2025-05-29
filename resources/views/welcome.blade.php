<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>PHB Finance</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/coin.png') }}">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!--header section start -->
    <div class="header_section">
        <div class="header_left">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="index.html"><h1 class="display-6" style="color: #1B5A8D">PH<span style="color: #FDC915">B</span></h1></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.html">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register.form')}}">Register</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="banner_main">
                <h1 class="banner_taital">financial <br>Service</h1>
                <p class="banner_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                    Ipsum has been the industry's standard dummy text ever </p>
                <div class="btn_main">
                    <div class="more_bt"><a href="#">Read More </a></div>
                    <div class="contact_bt"><a href="#">Contact Us</a></div>
                </div>
            </div>
        </div>
        <div class="header_right">
            <img src="{{ asset('img/banner-img.png') }}" class="banner_img">
        </div>
    </div>
    <!--header section end -->
    <!--about section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="services_taital">WELCOME TO FINAnCIAL SERVICES</h1>
                    <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it
                        has a more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it </p>
                    <div class="moremore_bt"><a href="#">Read More </a></div>
                </div>
                <div class="col-md-4">
                    <div><img src="{{ asset('img/img-1.png') }}" class="image_1"></div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end -->
    <!--services section start -->
    <div class="what_we_do_section layout_padding">
        <div class="container">
            <h1 class="what_taital">WHAT WE DO</h1>
            <p class="what_text">It is a long established fact that a reader will be distracted by the readable content
                of a </p>
            <div class="what_we_do_section_2">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="box_main">
                            <div class="icon_1"><img src="{{ asset('img/icon-1.png') }}"></div>
                            <h3 class="accounting_text">Great Exchange Rates</h3>
                            <p class="lorem_text">Get more for your money with our excellent rates.</p>
                            <div class="moremore_bt_1"><a href="#">Read More </a></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="box_main active">
                            <div class="icon_1"><img src="{{ asset('img/icon-2.png') }}"></div>
                            <h3 class="accounting_text">Anytime, Anywhere</h3>
                            <p class="lorem_text">Fast, reliable transfers over the phone or online 24/7.</p>
                            <div class="moremore_bt_1"><a href="#">Read More </a></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="box_main">
                            <div class="icon_1"><img src="{{ asset('img/icon-3.png') }}"></div>
                            <h3 class="accounting_text">Multi Award-Winning</h3>
                            <p class="lorem_text">Moneyfacts Consumer award-winner 2016 - 2025</p>
                            <div class="moremore_bt_1"><a href="#">Read More </a></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="box_main">
                            <div class="icon_1"><img src="{{ asset('img/icon-4.png') }}"></div>
                            <h3 class="accounting_text">No Transfer Fees</h3>
                            <p class="lorem_text">Move your money quickly and securely.</p>
                            <div class="moremore_bt_1"><a href="#">Read More </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--services section end -->
    <!--project section start -->
    <div class="project_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="project_main">
                        <h1 class="services_taital">Our projects</h1>
                        <p class="services_text">It is a long established fact that a reader will be distracted by the
                            readable content of a </p>
                        <div class="moremore_bt"><a href="#">Read More </a></div>
                        <div class="image_6"><img src="{{ asset('img/img-6.png') }}"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="images_main">
                        <div class="images_left">
                            <div class="container_1">
                                <img src="{{ asset('img/img-2.png') }}" alt="Avatar" class="image"
                                    style="width:100%">
                                <div class="middle">
                                    <div class="text"><img src="{{ asset('img/search-icon.png') }}"></div>
                                    <h2 class="fact_text">Established Fact</h2>
                                </div>
                            </div>
                            <div class="container_1">
                                <img src="{{ asset('img/baht.jpeg') }}" alt="Avatar" class="image"
                                    style="width:100%">
                                <div class="middle">
                                    <div class="text"><img src="{{ asset('img/search-icon.png') }}"></div>
                                    <h2 class="fact_text">Established Fact</h2>
                                </div>
                            </div>
                        </div>
                        <div class="images_right">
                            <div class="container_1">
                                <img src="{{ asset('img/img-4.png') }}" alt="Avatar" class="image"
                                    style="width:100%">
                                <div class="middle">
                                    <div class="text"><img src="{{ asset('img/search-icon.png') }}"></div>
                                    <h2 class="fact_text">Established Fact</h2>
                                </div>
                            </div>
                            <div class="container_1">
                                <img src="{{ asset('img/img-5.png') }}" alt="Avatar" class="image"
                                    style="width:100%">
                                <div class="middle">
                                    <div class="text"><img src="{{ asset('img/search-icon.png') }}"></div>
                                    <h2 class="fact_text">Established Fact</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project_section_2 layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="icon_1"><img src="{{ asset('img/icon-3.png') }}"></div>
                    <h3 class="accounting_text_1">1000+</h3>
                    <p class="yers_text">Years of Business</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="icon_1"><img src="{{ asset('img/icon-4.png') }}"></div>
                    <h3 class="accounting_text_1">20000+</h3>
                    <p class="yers_text">Projects Delivered</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="icon_1"><img src="{{ asset('img/icon-2.png') }}"></div>
                    <h3 class="accounting_text_1">10000+</h3>
                    <p class="yers_text">Satisfied Customers</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="icon_1"><img src="{{ asset('img/icon-1.png') }}"></div>
                    <h3 class="accounting_text_1">1500+</h3>
                    <p class="yers_text">Services</p>
                </div>
            </div>
        </div>
    </div>
    <!--project section end -->

    <!--client section start -->
    <div class="client_section layout_padding">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h1 class="what_taital">what is says our clients</h1>
                        <div class="client_section_2 layout_padding">
                            <ul>
                                <li><img src="{{ asset('img/round-1.png') }}" class="round_1"></li>
                                <li><img src="{{ asset('img/img-11.png') }}" class="image_11"></li>
                                <li><img src="{{ asset('img/round-2.png') }}" class="round_2"></li>
                            </ul>
                            <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking at its layout. The point of using Lorem</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <h1 class="what_taital">what is syas our clients</h1>
                        <div class="client_section_2 layout_padding">
                            <ul>
                                <li><img src="{{ asset('img/round-1.png') }}" class="round_1"></li>
                                <li><img src="{{ asset('img/img-11.png') }}" class="image_11"></li>
                                <li><img src="{{ asset('img/round-2.png') }}" class="round_2"></li>
                            </ul>
                            <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking at its layout. The point of using Lorem</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <h1 class="what_taital">what is syas our clients</h1>
                        <div class="client_section_2 layout_padding">
                            <ul>
                                <li><img src="{{ asset('img/round-1.png') }}" class="round_1"></li>
                                <li><img src="{{ asset('img/img-11.png') }}" class="image_11"></li>
                                <li><img src="{{ asset('img/round-2.png') }}" class="round_2"></li>
                            </ul>
                            <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                                readable content of a page when looking at its layout. The point of using Lorem</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--client section end -->
    <!--footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <h4 class="about_text">About Financial</h4>
                    <div class="location_text"><img src="{{asset('img/map-icon.png')}}"><span
                            class="padding_left_15">Locations</span></div>
                    <div class="location_text"><img src="{{asset('img/call-icon.png')}}"><span class="padding_left_15">+01
                            9876543210</span></div>
                    <div class="location_text"><img src="{{asset('img/mail-icon.png')}}"><span
                            class="padding_left_15">demo@gmail.com</span></div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h4 class="about_text">About Financial</h4>
                    <p class="dolor_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h4 class="about_text">Instagram</h4>
                    <div class="footer_images">
                        <div class="footer_images_left">
                            <div class="image_12"><img src="{{asset('img/img-12.png')}}"></div>
                            <div class="image_12"><img src="{{asset('img/img-12.png')}}"></div>
                            <div class="image_12"><img src="{{asset('img/img-12.png')}}"></div>
                        </div>
                        <div class="footer_images_right">
                            <div class="image_12"><img src="{{asset('img/img-12.png')}}"></div>
                            <div class="image_12"><img src="{{asset('img/img-12.png')}}"></div>
                            <div class="image_12"><img src="{{asset('img/img-12.png')}}"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h4 class="about_text">Newsletter</h4>
                    <input type="text" class="mail_text" placeholder="Enter your email" name="Enter your email">
                    <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                    <div class="footer_social_icon">
                        <ul>
                            <li><a href="#"><img src="{{asset('img/fb-icon1.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('img/twitter-icon1.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('img/linkedin-icon1.png')}}"></a></li>
                            <li><a href="#"><img src="{{asset('img/youtub-icon1.png')}}"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- copyright section start -->
            <div class="copyright_section">
                <div class="copyright_text">Copyright <span id="currentYear"></span> All Rights Reserved.</div>
            </div>
            <!-- copyright section end -->
        </div>
    </div>
    <!--footer section end -->

    <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
    </script>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
