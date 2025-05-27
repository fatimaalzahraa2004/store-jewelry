@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-cogs me-2"></i> لوحة تحكم المدير</h2>

    <div class="row animate__animated animate__fadeInUp">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-primary text-white">
                <div class="card-body">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5 class="card-title">إجمالي المستخدمين</h5>
                    <p class="card-text fs-2 fw-bold">{{ $totalUsers }}</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-sm mt-2 text-primary">إدارة المستخدمين <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-info text-white">
                <div class="card-body">
                    <i class="fas fa-gem fa-3x mb-3"></i>
                    <h5 class="card-title">إجمالي المنتجات</h5>
                    <p class="card-text fs-2 fw-bold">{{ $totalProducts }}</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light btn-sm mt-2 text-info">إدارة المنتجات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-warning text-dark">
                <div class="card-body">
                    <i class="fas fa-hourglass-half fa-3x mb-3"></i>
                    <h5 class="card-title">منتجات قيد التحقق</h5>
                    <p class="card-text fs-2 fw-bold">{{ $pendingProducts }}</p>
                    <a href="{{ route('admin.products.index', ['status' => 'قيد التحقق']) }}" class="btn btn-light btn-sm mt-2 text-warning">مراجعة المنتجات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card text-center h-100 shadow-sm bg-success text-white">
                <div class="card-body">
                    <i class="fas fa-receipt fa-3x mb-3"></i>
                    <h5 class="card-title">إجمالي الطلبات</h5>
                    <p class="card-text fs-2 fw-bold">{{ $totalOrders }}</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light btn-sm mt-2 text-success">إدارة الطلبات <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row animate__animated animate__fadeInUp mt-4">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-tags fa-3x text-secondary mb-3"></i>
                    <h5 class="card-title">إدارة الأصناف</h5>
                    <p class="card-text">إضافة، تعديل، حذف أنواع المنتجات (الأصناف).</p>
                    <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary btn-sm mt-2">إدارة الأصناف <i class="fas fa-arrow-alt-circle-right ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-file-invoice-dollar fa-3x text-dark mb-3"></i>
                    <h5 class="card-title">التقارير المالية</h5>
                    <p class="card-text">عرض تقارير المبيعات والإيرادات.</p>
                    <a href="#" class="btn btn-dark btn-sm mt-2 disabled">قريباً <i class="fas fa-chart-pie ms-1"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">دعم العملاء</h5>
                    <p class="card-text">مراجعة رسائل الدعم والرد على استفسارات العملاء.</p>
                    <a href="#" class="btn btn-primary btn-sm mt-2 disabled">قريباً <i class="fas fa-inbox ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection