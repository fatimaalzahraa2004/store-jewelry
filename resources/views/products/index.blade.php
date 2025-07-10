@extends('layouts.template')

@section('title', 'المتجر - تصفح المنتجات')

@section('content')
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>المتجر</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li><a href="{{ route('products.index') }}" class="active">المتجر</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 mt-5 mt-lg-0 order-last order-lg-first">
                <div id="sidebar-area-wrap">
                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">فلترة المنتجات</h2>
                        <div class="sidebar-body">
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="shopping-option">
                                    <div class="shopping-option-item">
                                        <h4>بحث بالاسم</h4>
                                        <input type="text" name="search" class="form-control mb-3" placeholder="ابحث..." value="{{ request('search') }}">
                                    </div>

                                    <div class="shopping-option-item">
                                        <h4>الأصناف</h4>
                                        <ul class="sidebar-list">
                                            @foreach ($productTypes as $type)
                                            <li><a href="{{ route('products.index', ['type_id' => $type->id]) }}">{{ $type->type_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="shopping-option-item">
                                        <h4>السعر</h4>
                                        <div class="d-flex align-items-center">
                                            <input type="number" name="min_price" class="form-control" placeholder="من" value="{{ request('min_price') }}">
                                            <span class="mx-2">-</span>
                                            <input type="number" name="max_price" class="form-control" placeholder="إلى" value="{{ request('max_price') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-add-to-cart mt-3 w-100">تطبيق الفلتر</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->
                </div>
            </div>
            <!-- Sidebar Area End -->

            <!-- Shop Page Content Start -->
            <div class="col-lg-9">
                <div class="shop-page-content-wrap">
                    <div class="products-settings-option d-block d-md-flex">
                        <div class="product-cong-left d-flex align-items-center">
                            <span class="show-items">عرض {{ $products->firstItem() }} - {{ $products->lastItem() }} من {{ $products->total() }} منتج</span>
                        </div>
                    </div>

                    <div class="shop-page-products-wrap">
                        <div class="products-wrapper">
                            <div class="row">
                                @if ($products->isEmpty())
                                    <div class="col-12">
                                        <div class="alert alert-info text-center" role="alert">
                                            لا توجد منتجات مطابقة لمعايير البحث الخاصة بك.
                                        </div>
                                    </div>
                                @else
                                    @foreach ($products as $product)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="single-product-item text-center">
                                            <figure class="product-thumb">
                                                <a href="{{ route('products.show', $product->id) }}">
                                                    <img src="{{ $product->album_photos && count($product->album_photos) > 0 ? asset('storage/' . $product->album_photos[0]) : asset('template/img/placeholder.png') }}" alt="{{ $product->product_name }}" class="img-fluid">
                                                </a>
                                            </figure>

                                            <div class="product-details">
                                                <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->product_name }}</a></h2>
                                                @if ($product->rating)
                                                    <div class="rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $product->rating) <i class="fa fa-star"></i>
                                                            @elseif ($i - 0.5 <= $product->rating) <i class="fa fa-star-half-o"></i>
                                                            @else <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                @endif
                                                <span class="price">${{ number_format($product->price, 2) }}</span>
                                                <p class="products-desc">{{ $product->shape ?? $product->type->type_name ?? 'قطعة مجوهرات فريدة' }}</p>
                                                
                                                @auth
                                                    @if(Auth::user()->isBuyer())
                                                    <form action="{{ route('cart.store') }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn btn-add-to-cart">+ إضافة للسلة</button>
                                                    </form>
                                                    
                                                    @php $wishlistItem = $userWishlistItems->firstWhere('product_id', $product->id); @endphp
                                                    @if ($wishlistItem)
                                                        <form action="{{ route('wishlist.destroy', $wishlistItem->id) }}" method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-add-to-cart btn-whislist" title="إزالة من المفضلة"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('wishlist.store') }}" method="POST" class="d-inline-block">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-add-to-cart btn-whislist" title="إضافة للمفضلة"><i class="fa fa-heart-o"></i></button>
                                                        </form>
                                                    @endif
                                                    @endif
                                                @endauth
                                            </div>
                                            @if ($product->status == 'جديد') <span class="product-bedge">جديد</span> @endif
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="products-settings-option d-block d-md-flex mt-4">
                        {{-- Laravel Pagination --}}
                        {{ $products->appends(request()->query())->links('vendor.pagination.template-custom') }}
                    </div>
                </div>
            </div>
            <!-- Shop Page Content End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
@endsection