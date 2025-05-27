@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-gem me-2"></i> استكشف مجموعتنا من الجواهر</h2>

    {{-- قسم البحث والفلاتر --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('products.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="search" class="form-label visually-hidden">بحث</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="ابحث باسم المنتج أو النوع..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label for="type_id" class="form-label visually-hidden">الصنف</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option value="">جميع الأصناف</option>
                        @foreach ($productTypes as $type)
                            <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->type_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="min_price" class="form-label visually-hidden">الحد الأدنى للسعر</label>
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="السعر من" value="{{ request('min_price') }}">
                </div>
                <div class="col-md-2">
                    <label for="max_price" class="form-label visually-hidden">الحد الأقصى للسعر</label>
                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="السعر إلى" value="{{ request('max_price') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter"></i></button>
                </div>
            </form>
        </div>
    </div>

    {{-- قائمة المنتجات --}}
    @if ($products->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد منتجات مطابقة لمعايير البحث الخاصة بك.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 product-card shadow-sm animate__animated animate__fadeInUp">
                        @if ($product->album_photos && count($product->album_photos) > 0)
                            <img src="{{ asset('storage/' . $product->album_photos[0]) }}" class="card-img-top product-card-img" alt="{{ $product->product_name }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" class="card-img-top product-card-img" alt="صورة غير متوفرة">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $product->product_name }}</h5>
                            <p class="card-text text-muted">{{ $product->type->type_name ?? 'غير محدد' }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold fs-5 text-gold">{{ number_format($product->price, 2) }} $</span>
                                @if ($product->rating)
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product->rating)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $product->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <small class="text-muted">({{ $product->rating }})</small>
                                    </div>
                                @else
                                    <small class="text-muted">لا توجد تقييمات</small>
                                @endif
                            </div>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-info btn-sm">عرض التفاصيل <i class="fas fa-eye ms-1"></i></a>
                                @auth
                                    @if (Auth::user()->isBuyer())
                                        <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="quantity" value="1"> {{-- يمكن إضافة حقل للكمية --}}
                                            <button type="submit" class="btn btn-success btn-sm">إضافة للسلة <i class="fas fa-cart-plus ms-1"></i></button>
                                        </form>
                                        <form action="{{ route('wishlist.store') }}" method="POST" class="d-inline ms-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="إضافة للمفضلة">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-5') }} {{-- استخدام تصميم Bootstrap للترقيم --}}
        </div>
    @endif
</div>
@endsection