<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="متجر الجواهر - أفضل الجواهر والأحجار الكريمة">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'متجر الجواهر')</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="{{ asset('template/img/favicon.ico') }}" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i"/>

    <!--=== Bootstrap & Plugins CSS ===-->
    <link href="{{ asset('template/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/vendor/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/plugins.css') }}" rel="stylesheet">
    
    <!--=== Main Style CSS ===-->
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    
    
    @stack('styles')

    <!-- Modernizer JS -->
    <script src="{{ asset('template/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>

<!--== Header Area Start ==-->
<header id="header-area">
    <div class="ruby-container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-3 col-lg-1 col-xl-2 m-auto">
                <a href="{{ route('welcome') }}" class="logo-area">
                    <img src="{{ asset('template/img/logo.png') }}" alt="Logo" class="img-fluid"/>
                </a>
            </div>
            <!-- Logo Area End -->

            <!-- Navigation Area Start -->
            <div class="col-3 col-lg-9 col-xl-8 m-auto">
                <div class="main-menu-wrap">
                    <nav id="mainmenu">
                        <ul>
                            <li><a href="{{ route('welcome') }}">الرئيسية</a></li>
                            <li><a href="{{ route('products.index') }}">المتجر</a></li>
                            @auth
                                @if(Auth::user()->isAdmin())
                                    <li><a href="{{ route('admin.dashboard') }}">لوحة تحكم المدير</a></li>
                                @elseif(Auth::user()->isSeller())
                                    <li><a href="{{ route('seller.products.index') }}">لوحة تحكم البائع</a></li>
                                @else
                                    <li><a href="{{ route('home') }}">حسابي</a></li>
                                @endif
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Navigation Area End -->

            <!-- Header Right Meta Start -->
            <div class="col-6 col-lg-2 m-auto">
                <div class="header-right-meta text-right">
                    <ul>
                        <li class="settings"><a href="#"><i class="fa fa-cog"></i></a>
                            <div class="site-settings d-block d-sm-flex">
                                <dl class="my-account">
                                    <dt>حسابي</dt>
                                    @guest
                                        <dd><a href="{{ route('login') }}">تسجيل الدخول</a></dd>
                                        <dd><a href="{{ route('register') }}">إنشاء حساب</a></dd>
                                    @else
                                        <dd><a href="{{ route('profile.index') }}">الملف الشخصي</a></dd>
                                        <dd><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                تسجيل الخروج
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </dd>
                                    @endguest
                                </dl>
                            </div>
                        </li>
                        @auth
                            @if(Auth::user()->isBuyer())
                                <li class="shop-cart"><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i> 
                                    <span class="count">{{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}</span></a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>
            </div>
            <!-- Header Right Meta End -->
        </div>
    </div>
</header>
<!--== Header Area End ==-->

<!-- Page Content Starts Here -->
@yield('content')
<!-- Page Content Ends Here -->

<!-- Footer Area Start -->
<footer id="footer-area">
    <div class="footer-callto-action">
        <div class="ruby-container">
            <div class="callto-action-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-callto-action d-flex">
                            <figure class="callto-thumb">
                                <img src="{{ asset('template/img/air-plane.png') }}" alt="شحن"/>
                            </figure>
                            <div class="callto-info">
                                <h2>شحن مجاني وآمن</h2>
                                <p>للطلبات فوق 200$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-callto-action d-flex">
                            <figure class="callto-thumb">
                                <img src="{{ asset('template/img/support.png') }}" alt="Support"/>
                            </figure>
                            <div class="callto-info">
                                <h2>دعم فني 24/7</h2>
                                <p>اتصل بنا في أي وقت</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-callto-action d-flex">
                            <figure class="callto-thumb">
                                <img src="{{ asset('template/img/money-back.png') }}" alt="Money Back"/>
                            </figure>
                            <div class="callto-info">
                                <h2>ضمان استعادة الأموال</h2>
                                <p>إرجاع خلال 14 يوم</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-callto-action d-flex">
                            <figure class="callto-thumb">
                                <img src="{{ asset('template/img/cog.png') }}" alt="Guide"/>
                            </figure>
                            <div class="callto-info">
                                <h2>تصاميم خاصة</h2>
                                <p>نصمم لك ما تحلم به</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="ruby-container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>جميع الحقوق محفوظة © {{ date('Y') }} لمتجر الجواهر</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- Scroll to Top Start -->
<a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
<!-- Scroll to Top End -->

<!--=======================Javascript============================-->
<script src="{{ asset('template/js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('template/js/vendor/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('template/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('template/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('template/js/plugins.js') }}"></script>
<script src="{{ asset('template/js/active.js') }}"></script>

@stack('scripts')
</body>
</html>