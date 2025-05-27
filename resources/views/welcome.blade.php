@extends('layouts.app')

@section('content')
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-3 mb-4 animate__animated animate__fadeInDown">أفخم الجواهر بين يديك</h1>
        <p class="lead mb-5 animate__animated animate__fadeInUp">اكتشف مجموعتنا الفريدة من الخواتم والأساور والقلائد الماسية والذهبية.</p>
        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg animate__animated animate__zoomIn">تصفح منتجاتنا <i class="fas fa-gem ms-2"></i></a>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">لماذا تختار متجرنا؟</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <i class="fas fa-star fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">جودة لا تضاهى</h5>
                    <p class="card-text">نقدم فقط أجود أنواع الجواهر المصممة بدقة وعناية فائقة لتدوم طويلاً.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <i class="fas fa-certificate fa-3x text-info mb-3"></i>
                    <h5 class="card-title">شهادات معتمدة</h5>
                    <p class="card-text">جميع منتجاتنا تأتي مع شهادات أصالة وضمان لراحة بالك التامة.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <i class="fas fa-shipping-fast fa-3x text-success mb-3"></i>
                    <h5 class="card-title">توصيل سريع وآمن</h5>
                    <p class="card-text">نوفر خدمة توصيل سريعة وموثوقة لضمان وصول جواهرك بأمان إلى باب منزلك.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <h2>المجموعات المميزة</h2>
    <p class="lead mb-4">استكشف بعضًا من أروع مجموعاتنا المصممة بعناية لتناسب جميع الأذواق.</p>
    <div class="row justify-content-center">
        {{-- هنا يمكنك عرض بعض المنتجات المميزة يدوياً أو ديناميكياً --}}
        <div class="col-md-4 mb-4">
            <div class="card h-100 product-card">
                <img src="{{ asset('images/sample_ring.jpg') }}" class="card-img-top product-card-img" alt="خاتم ألماس">
                <div class="card-body">
                    <h5 class="card-title">خاتم ألماس كلاسيكي</h5>
                    <p class="card-text text-muted">أناقة خالدة تضيء كل مناسبة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">عرض المزيد</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 product-card">
                <img src="{{ asset('images/sample_necklace.jpg') }}" class="card-img-top product-card-img" alt="قلادة ذهب">
                <div class="card-body">
                    <h5 class="card-title">قلادة ذهبية عصرية</h5>
                    <p class="card-text text-muted">تصميم فريد يواكب أحدث صيحات الموضة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">عرض المزيد</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 product-card">
                <img src="{{ asset('images/sample_bracelet.jpg') }}" class="card-img-top product-card-img" alt="سوار ياقوت">
                <div class="card-body">
                    <h5 class="card-title">سوار ياقوت أزرق</h5>
                    <p class="card-text text-muted">قطعة فنية نادرة تضفي لمسة من الفخامة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-dark">عرض المزيد</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection