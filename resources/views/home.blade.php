@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i> لوحة التحكم</h3>
                </div>

                <div class="card-body p-4">
                    @auth
                        @php
                            $user = Auth::user();
                        @endphp
                        <p class="lead text-center">مرحباً بك، <span class="text-primary fw-bold">{{ $user->first_name }} {{ $user->last_name }}</span>!</p>

                        @if ($user->isAdmin())
                            <div class="alert alert-info text-center mt-3" role="alert">
                                أنت مسجل الدخول كـ <span class="fw-bold">مدير</span>. يمكنك الوصول إلى لوحة تحكم المدير <a href="{{ route('admin.dashboard') }}" class="alert-link">من هنا</a>.
                            </div>
                        @elseif ($user->isSeller())
                            <div class="alert alert-info text-center mt-3" role="alert">
                                أنت مسجل الدخول كـ <span class="fw-bold">بائع</span>. يمكنك إدارة منتجاتك من لوحة البائع <a href="{{ route('seller.dashboard') }}" class="alert-link">من هنا</a>.
                            </div>
                        @else {{-- المستخدم العادي (المشتري) --}}
                            <div class="alert alert-info text-center mt-3" role="alert">
                                أنت مسجل الدخول كـ <span class="fw-bold">مشتري</span>. يمكنك تصفح المنتجات والتحقق من طلباتك.
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center h-100 shadow-sm">
                                        <div class="card-body">
                                            <i class="fas fa-shopping-cart fa-3x text-primary mb-3"></i>
                                            <h5 class="card-title">سلة التسوق</h5>
                                            <p class="card-text">راجع المنتجات في سلتك وأتمم عملية الشراء.</p>
                                            <a href="{{ route('cart.index') }}" class="btn btn-primary btn-sm mt-2">عرض السلة</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center h-100 shadow-sm">
                                        <div class="card-body">
                                            <i class="fas fa-box fa-3x text-success mb-3"></i>
                                            <h5 class="card-title">طلباتي</h5>
                                            <p class="card-text">تتبع حالة طلباتك السابقة.</p>
                                            <a href="{{ route('orders.index') }}" class="btn btn-success btn-sm mt-2">عرض الطلبات</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center h-100 shadow-sm">
                                        <div class="card-body">
                                            <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                                            <h5 class="card-title">المفضلة</h5>
                                            <p class="card-text">المنتجات التي أعجبتك لتجدها لاحقاً.</p>
                                            <a href="{{ route('wishlist.index') }}" class="btn btn-danger btn-sm mt-2">عرض المفضلة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('products.index') }}" class="btn btn-info btn-lg"><i class="fas fa-search me-2"></i> تصفح المنتجات</a>
                            </div>
                        @endif
                    @else
                        <p class="text-center">أهلاً بك! يرجى <a href="{{ route('login') }}">تسجيل الدخول</a> أو <a href="{{ route('register') }}">إنشاء حساب</a> للوصول إلى الميزات الكاملة.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection