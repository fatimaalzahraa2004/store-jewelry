@extends('layouts.template')

@section('title', 'متجر الجواهر - الصفحة الرئيسية')

@section('content')

<!--== Banner // Slider Area Start ==-->
<section id="banner-area">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12">
                {{-- الكاروسيل الرئيسي للصفحة --}}
                <div id="banner-carousel" class="owl-carousel">
                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-1">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>مجموعة 2025</h4>
                            <h2>خاتم سوليتير للأميرات</h2>
                            <p>تصاميم فريدة تعبر عن الأناقة والجمال الخالد.</p>
                            <a href="{{ route('products.index') }}" class="btn-long-arrow">تسوقي الآن</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->

                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-2">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>أحدث التشكيلات</h4>
                            <h2>أقراط ذهبية مميزة</h2>
                            <p>أضيفي لمسة من التألق إلى إطلالتك اليومية مع مجموعتنا الجديدة.</p>
                            <a href="{{ route('products.index') }}" class="btn-long-arrow">اكتشفي المجموعة</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Banner Slider End ==-->

<!--== New Collection Area Start ==-->
<section id="new-collection-area" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>أحدث المنتجات</h2>
                    <p>قطع مختارة بعناية لتتألقي بها.</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="new-collection-tabs">
                    <!-- Tab Content Area Start -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="feature-products" role="tabpanel" aria-labelledby="feature-products-tab">
                            <div class="products-wrapper">
                                @if(isset($latestProducts) && !$latestProducts->isEmpty())
                                <div class="products-carousel owl-carousel"> {{-- هذا الكاروسيل للمنتجات --}}
                                    @foreach($latestProducts as $product)
                                    <!-- Single Product Item -->
                                    <div class="single-product-item text-center">
                                        <figure class="product-thumb">
                                            <a href="{{ route('products.show', $product->id) }}">
                                                {{-- استخدام مسار صورة المنتج من Storage أو صورة افتراضية --}}
                                                <img src="{{ $product->album_photos && count($product->album_photos) > 0 ? asset('storage/' . $product->album_photos[0]) : asset('template/img/product-1.jpg') }}"
                                                     alt="{{ $product->product_name }}" class="img-fluid">
                                            </a>
                                        </figure>

                                        <div class="product-details">
                                            <h2><a href="{{ route('products.show', $product->id) }}">{{ Str::limit($product->product_name, 25) }}</a></h2>
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
                                            
                                            <form action="{{ route('cart.store') }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-add-to-cart">+ إضافة للسلة</button>
                                            </form>
                                            
                                            @if($product->created_at->isAfter(now()->subDays(10)))
                                                <span class="product-bedge">جديد</span>
                                            @endif
                                        </div>

                                        <div class="product-meta">
                                            <a href="{{ route('products.show', $product->id) }}" data-toggle="tooltip" data-placement="left" title="عرض التفاصيل"><i class="fa fa-search-plus"></i></a>
                                            @auth
                                                @if(Auth::user()->isBuyer())
                                                    @php $wishlistItem = $userWishlistItems->firstWhere('product_id', $product->id); @endphp
                                                    @if($wishlistItem)
                                                        <form action="{{ route('wishlist.destroy', $wishlistItem->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="wishlist-btn" data-toggle="tooltip" data-placement="left" title="إزالة من المفضلة"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('wishlist.store') }}" method="POST" class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button type="submit" class="wishlist-btn" data-toggle="tooltip" data-placement="left" title="إضافة للمفضلة"><i class="fa fa-heart-o"></i></button>
                                                        </form>
                                                    @endif
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" class="wishlist-btn" data-toggle="tooltip" data-placement="left" title="إضافة للمفضلة"><i class="fa fa-heart-o"></i></a>
                                            @endauth
                                        </div>
                                    </div>
                                    <!-- Single Product Item -->
                                    @endforeach
                                </div>
                                @else
                                <div class="alert alert-info text-center py-5">
                                    <h4>لا توجد منتجات جديدة لعرضها حالياً.</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--== New Collection Area End ==-->

<!--== Products by Category Area Start ==-->
<div id="product-categories-area">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="large-size-cate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="{{ route('products.index', ['type_id' => 1]) }}"><img src="{{ asset('template/img/sale-product-1.jpg') }}" alt="خواتم" class="img-fluid"/></a>
                                    <figcaption class="category-name">
                                        <a href="{{ route('products.index', ['type_id' => 1]) }}">خواتم</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="{{ route('products.index', ['type_id' => 2]) }}"><img src="{{ asset('template/img/home_6_cat_1.jpg') }}" alt="أساور" class="img-fluid"/></a>
                                    <figcaption class="category-name">
                                        <a href="{{ route('products.index', ['type_id' => 2]) }}">أساور</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="small-size-cate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="{{ route('products.index', ['type_id' => 3]) }}"><img src="{{ asset('template/img/new-product-3.jpg') }}" alt="قلائد" class="img-fluid"/></a>
                                    <figcaption class="category-name">
                                        <a href="{{ route('products.index', ['type_id' => 3]) }}">قلائد</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="{{ route('products.index', ['type_id' => 4]) }}"><img src="{{ asset('template/img/single-pro-thumb.jpg') }}" alt="أقراط" class="img-fluid"/></a>
                                    <figcaption class="category-name">
                                        <a href="{{ route('products.index', ['type_id' => 4]) }}">أقراط</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Products by Category Area End ==-->

<!--== Testimonial Area Start ==-->
<section id="testimonial-area" class="p-9">
    <div class="ruby-container">
        <div class="testimonial-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>ماذا يقول عملاؤنا</h2>
                        <p>شهادات نعتز بها</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 m-auto text-center">
                    <div class="testimonial-content-wrap">
                        <div id="testimonialCarousel" class="owl-carousel">
                            <div class="single-testimonial-item">
                                <p>خدمة رائعة ومنتجات تفوق الخيال. كانت تجربة شراء ممتعة وسأعود بالتأكيد!</p>
                                <h3 class="client-name">نورة عبدالله</h3>
                                <span class="client-email">الرياض</span>
                            </div>
                            <div class="single-testimonial-item">
                                <p>الجودة والدقة في التصميم لا مثيل لها. شكراً لكم على هذه القطع الفنية الرائعة.</p>
                                <h3 class="client-name">أحمد المصري</h3>
                                <span class="client-email">دبي</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Testimonial Area End ==-->

@endsection

@push('scripts')
<style>
    .product-meta button.wishlist-btn {
        background: none;
        border: none;
        color: #666;
        cursor: pointer;
        padding: 0;
        font: inherit;
        line-height: 1;
    }
    .product-meta button.wishlist-btn:hover {
        color: #d6b383;
    }
</style>
{{-- لا حاجة لإضافة كود تهيئة Owl Carousel هنا بعد الآن، active.js سيتولى المهمة --}}
@endpush