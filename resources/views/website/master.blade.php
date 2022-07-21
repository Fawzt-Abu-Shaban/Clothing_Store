<?php
use App\Models\Categorie;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Clothing Store.</title>
    <!-- Favicon الايكون الي فووق عند العنوان-->
    <link rel="icon" type="image/png" href="{{ asset('userstyle/images/logoo.png') }} ">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('sliderstyle/css/color-01.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('userstyle/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('userstyle/style.css') }}">
    <link rel="stylesheet" href="{{ asset('userstyle/css/responsive.css') }}">


    <link rel="stylesheet" href="{{ asset('checkstyle/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('checkstyle/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .single-product .product-img a img {
            height: 315px;
            object-fit: cover;
        }
    </style>

    <style>
        .toast {
            background: #4e73df
        }
    </style>

    @if (app()->currentLocale() == 'ar')
        <style>
            body {
                direction: rtl;
                text-align: right;
            }
        </style>
    @endif


</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->


    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li><i class="ti-headphone-alt"></i> +97 (059) 2290 024</li>
                                <li><i class="ti-email"></i> foozi229@gmail.com</li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                {{-- <li><i class="ti-user"></i> <a href="#">{{ __('site.my_account') }}</a></li> --}}
                                <li>
                                    @auth
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="ti-power-off"></i>{{ __('site.logout') }}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @endauth

                                    @guest
                                        <a href="{{ route('login') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline"><i
                                                class="ti-power-off"></i>{{ __('site.login') }}</a>
                                    @endguest

                                </li>
                            </ul>
                        </div>
                        <!-- End Top Right -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('website.index') }}"><img
                                    src="{{ asset('userstyle/images/logoo.png') }} " alt="logo"></a>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="search-top">
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form">
                                    <input type="text" placeholder="Search here..." name="search">
                                    <button value="search" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                {{-- <select name="cate">
									<option selected="selected">All Category</option>
                                    @foreach (Categorie::all() as $cat)
                                    <option value="{{ $cat->id }}">{{$cat->name}}</option>
                                    @endforeach
								</select> --}}
                                <form action="{{ route('website.search') }}" method="GET">
                                    @csrf
                                    <input name="keyword" placeholder="Search Products Here....." type="search">
                                    <button class="btnn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                        $countw = 0;
                        if (Auth::user()) {
                            $countw = Auth::user()
                                ->cart()
                                ->where('type', 'wishlist')
                                ->whereNull('order_id')
                                ->count();
                        }
                    @endphp
                    <div class="col-lg-2 col-md-3 col-12">
                        <div class="right-bar">
                            <!-- Search Form -->
                            <div class="sinlge-bar">
                                <a href="{{ route('website.wishlist') }}" class="single-icon"><i class="fa fa-heart-o"
                                        aria-hidden="true"></i> <span
                                        class="total-count">{{ $countw }}</span></a>
                                {{-- <a href="{{ route('website.wishlist') }}" class="single-icon"><i
                                            class="fa fa-heart-o" aria-hidden="true"></i></a> --}}
                            </div>

                            @php
                                $count = 0;
                                if (Auth::user()) {
                                    $count = Auth::user()
                                        ->cart()
                                        ->where('type', 'cart')
                                        ->whereNull('order_id')
                                        ->count();
                                }
                                $totel = 0;
                            @endphp

                            <div class="sinlge-bar shopping">
                                <a href="#" class="single-icon"><i class="ti-bag"></i> <span
                                        class="total-count">{{ $count }}</span></a>
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ $count }} {{ __('site.items') }}</span>
                                        <a href="#">{{ __('site.view_cart') }}</a>
                                    </div>

                                    @auth
                                        <ul class="shopping-list">
                                            @foreach (Auth::user()->cart()->where('type', 'cart')->whereNull('order_id')->get() as $cart)
                                                <li>
                                                    <form action="{{ route('website.cartremoved', $cart->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="remove" title="Remove this item"><i
                                                                class="fa fa-remove"></i></button>
                                                    </form>
                                                    {{-- <a href="{{ route('website.remove' , $cart->id) }}" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a> --}}
                                                    <a class="cart-img" href="#"><img
                                                            src="{{ asset('images/' . $cart->product->image) }}"
                                                            alt="#"></a>
                                                    <h4><a href="#">{{ $cart->product->name }}</a></h4>
                                                    <p class="quantity">1x - <span
                                                            class="amount">${{ $cart->product->price }}</span></p>
                                                </li>
                                                @php
                                                    $totel += $cart->product->price;
                                                @endphp
                                            @endforeach

                                        </ul>
                                    @endauth

                                    <div class="bottom">
                                        <div class="total">
                                            <span>{{ __('site.total') }}</span>
                                            <span class="total-amount">${{ $totel }}</span>
                                        </div>
                                        <a href="{{ route('website.checkout') }}"
                                            class="btn animate">{{ __('site.checkout') }}</a>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                        <div class="col-lg-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg my-0">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li><a href="{{ route('website.index') }}">{{ __('site.home') }}</a>
                                                </li>
                                                <li><a href="#">{{ __('site.categories') }}<i
                                                            class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        @foreach (Categorie::all() as $item)
                                                            <li><a
                                                                    href="{{ route('website.category', $item->slug) }}">{{ $item->name }}
                                                                </a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a
                                                        href="{{ route('website.allproduct') }}">{{ __('site.product') }}</a>
                                                </li>
                                                <li><a href="#">{{ __('site.shop') }}<i
                                                            class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="{{ route('website.cart') }}">Cart</a></li>
                                                        <li><a href="{{ route('website.checkout') }}">Checkout</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a
                                                        href="{{ route('website.about_us') }}">{{ __('site.about_us') }}</a>
                                                </li>
                                                <li><a
                                                        href="{{ route('website.contact_us') }}">{{ __('site.contact_us') }}</a>
                                                </li>
                                                {{-- <li><a href="#">{{ __('site.languages') }}<i
                                                            class="ti-angle-down"></i></a>
                                                    <ul class="dropdown">

                                                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                            <li>
                                                                <a class="dropdown-item" rel="alternate"
                                                                    hreflang="{{ $localeCode }}"
                                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                    {{ $properties['native'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->

    @yield('content')

    <!-- Start Shop Services Area -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required=""
                                    type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            class="ti-close" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <h4
                                style="margin-top:100px;font-size:14px; font-weight:500; color:#ff3c45 ; display:block; margin-bottom:5px;">
                                Eshop Free Lite</h4>
                            <h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.
                                <h3>
                                    <p
                                        style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">
                                        Please, purchase full version of the template to get all pages, features and
                                        commercial license</p>
                                    <div class="button" style="margin-top:30px;">
                                        <a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/"
                                            target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Footer Top -->
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo">
                                <a href="#"><img src="{{ asset('userstyle/images/logoo.png') }} "
                                        alt="#"></a>
                            </div>
                            <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,
                                magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan
                                porttitor, facilisis luctus, metus.</p>
                            <p class="call">{{ __('site.question') }}<span><a style="color: #ff3c45"
                                        href="tel:123456789">+97 059 229 0024</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>{{ __('site.information') }}</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>{{ __('site.customer_service') }}</h4>
                            <ul>
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Get In Tuch</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - GAZA Al-Senaa Street.</li>
                                    <li>Palestain</li>
                                    <li>foozi229@gmail.com</li>
                                    <li>+972-0592290024</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
    </footer>
    <!-- /End Footer Area -->

    <!-- Jquery -->
    <script src=" {{ asset('userstyle/js/jquery.min.js') }} "></script>
    <script src=" {{ asset('userstyle/js/jquery-migrate-3.0.0.js') }} "></script>
    <script src=" {{ asset('userstyle/js/jquery-ui.min.js') }} "></script>
    <!-- Popper JS -->
    <script src=" {{ asset('userstyle/js/popper.min.js') }} "></script>
    <!-- Bootstrap JS -->
    <script src=" {{ asset('userstyle/js/bootstrap.min.js') }} "></script>
    <!-- Slicknav JS -->
    <script src=" {{ asset('userstyle/js/slicknav.min.js') }} "></script>
    <!-- Owl Carousel JS -->
    <script src=" {{ asset('userstyle/js/owl-carousel.js') }} "></script>
    <!-- Magnific Popup JS -->
    <script src=" {{ asset('userstyle/js/magnific-popup.js') }} "></script>
    <!-- Waypoints JS -->
    <script src=" {{ asset('userstyle/js/waypoints.min.js') }} "></script>
    <!-- Countdown JS -->
    <script src=" {{ asset('userstyle/js/finalcountdown.min.js') }} "></script>
    <!-- Nice Select JS -->
    <script src=" {{ asset('userstyle/js/nicesellect.js') }} "></script>
    <!-- Flex Slider JS -->
    <script src=" {{ asset('userstyle/js/flex-slider.js') }} "></script>
    <!-- ScrollUp JS -->
    <script src=" {{ asset('userstyle/js/scrollup.js') }} "></script>
    <!-- Onepage Nav JS -->
    <script src=" {{ asset('userstyle/js/onepage-nav.min.js') }} "></script>
    <!-- Easing JS -->
    <script src=" {{ asset('userstyle/js/easing.js') }} "></script>
    <!-- Active JS -->
    <script src=" {{ asset('userstyle/js/active.js') }} "></script>

    <script src=" {{ asset('sliderstyle/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }} "></script>
    <script src=" {{ asset('sliderstyle/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }} "></script>
    <script src=" {{ asset('sliderstyle/js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('sliderstyle/js/jquery.flexslider.js') }} "></script>
    <script src=" {{ asset('sliderstyle/js/chosen.jquery.min.js') }} "></script>
    <script src=" {{ asset('sliderstyle/js/owl.carousel.min.js') }} "></script>
    <script src=" {{ asset('sliderstyle/js/jquery.countdown.min.js') }} "></script>
    <script src=" {{ asset('sliderstyle/js/jquery.sticky.js') }} "></script>
    <script src=" {{ asset('sliderstyle/js/functions.js') }} "></script>

    <script src="https://cdn.checkout.com/js/framesv2.min.js"></script>
    <script src="{{ asset('checkstyle/app.js') }}"></script>

    <script>
        const userId = '{{ Auth::id() }}';
    </script>
    <script src="{{ asset('js\app.js') }}"></script>

</body>

</html>
