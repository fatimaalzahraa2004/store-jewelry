@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-store me-2"></i> لوحة تحكم البائع</h2>

    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-gem fa-3x text-info mb-3"></i>
                    <h5 class="card-title">منتجاتي</h5>
                    <p class="card-text">إدارة وعرض المنتجات التي قمت بإضافتها.</p>
                    <a href="{{ route('seller.products.index') }}" class="btn btn-info btn-sm mt-2">عرض المنتجات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-plus-circle fa-3x text-success mb-3"></i>
                    <h5 class="card-title">إضافة منتج جديد</h5>
                    <p class="card-text">أضف جواهرك الفريدة لبيعها في المتجر.</p>
                    <a href="{{ route('seller.products.create') }}" class="btn btn-success btn-sm mt-2">إضافة منتج <i class="fas fa-plus ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">الإحصائيات</h5>
                    <p class="card-text">تتبع أداء مبيعاتك ومنتجاتك.</p>
                    {{-- يمكن إضافة روابط لإحصائيات مفصلة لاحقًا --}}
                    <a href="#" class="btn btn-primary btn-sm mt-2 disabled">قريباً <i class="fas fa-chart-bar ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection