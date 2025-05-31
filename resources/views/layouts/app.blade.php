<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'متجر الجواهر') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40 !important;
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #ffc107 !important;
        }
        .dropdown-menu {
            background-color: #343a40;
        }
        .dropdown-item {
            color: #ffffff;
        }
        .dropdown-item:hover {
            background-color: #495057;
            color: #ffc107;
        }
        .card {
            border-radius: 0.75rem;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #343a40;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .bg-gold {
            background-color: #ffd700;
        }
        .text-gold {
            color: #ffd700;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            margin-top: 5rem;
        }
        .hero-section {
            background: url('{{ asset('images/jewelry_bg.jpg') }}') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .hero-section p {
            font-size: 1.5rem;
        }
        .product-card-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        .stars .fa-star {
            color: #ffd700;
        }

        /* 🔴🔴🔴 CSS الجديد لأسهم الكاروسيل 🔴🔴🔴 */
        .carousel-control-icon-custom {
            background-color: rgba(0, 0, 0, 0.5); /* خلفية شبه شفافة */
            border-radius: 50%; /* لجعلها دائرية */
            width: 50px; /* حجم الأيقونة */
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffc107; /* لون ذهبي للأيقونات */
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .carousel-control-icon-custom:hover {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff; /* لون أبيض عند التمرير */
        }
        .carousel-control-prev, .carousel-control-next {
            width: 8%; /* لزيادة منطقة النقر */
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            display: none; /* إخفاء الأيقونات الافتراضية لـ Bootstrap */
        }

        /* 🔴🔴🔴 CSS الجديد لتكبير الصورة عند التمرير 🔴🔴🔴 */
        .product-image-zoom {
            transition: transform 0.5s ease-in-out; /* تأثير انتقال سلس */
            cursor: zoom-in; /* تغيير شكل المؤشر */
        }
        .product-image-zoom:hover {
            transform: scale(2.55); /* تكبير الصورة بنسبة 5% */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'متجر الجواهر') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">{{ __('المنتجات') }}</a>
                        </li>
                        @auth
                            @if(Auth::user()->isBuyer())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart.index') }}">{{ __('السلة') }} <i class="fas fa-shopping-cart"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">{{ __('طلباتي') }} <i class="fas fa-box"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('wishlist.index') }}">{{ __('المفضلة') }} <i class="fas fa-heart"></i></a>
                                </li>
                            @endif

                            @if(Auth::user()->isSeller())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('seller.products.index') }}">{{ __('لوحة البائع') }} <i class="fas fa-store"></i></a>
                                </li>
                            @endif

                            @if(Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('لوحة المدير') }} <i class="fas fa-cogs"></i></a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('إنشاء حساب') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('الملف الشخصي') }} <i class="fas fa-user-circle"></i>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل الخروج') }} <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                {{-- رسائل الفلاش --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- محتوى الصفحة الرئيسي --}}
                @yield('content')
            </div>
        </main>

        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container text-center">
                <p>© {{ date('Y') }} متجر الجواهر. جميع الحقوق محفوظة.</p>
                <div class="social-icons">
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>