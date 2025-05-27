@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-heart me-2"></i> قائمة المفضلة</h2>

    @if ($wishlistItems->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            قائمة المفضلة الخاصة بك فارغة. <a href="{{ route('products.index') }}" class="alert-link">تصفح المنتجات وأضف ما يعجبك!</a>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($wishlistItems as $item)
                <div class="col">
                    <div class="card h-100 product-card shadow-sm animate__animated animate__fadeInUp">
                        @if ($item->product->album_photos && count($item->product->album_photos) > 0)
                            <img src="{{ asset('storage/' . $item->product->album_photos[0]) }}" class="card-img-top product-card-img" alt="{{ $item->product->product_name }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" class="card-img-top product-card-img" alt="صورة غير متوفرة">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $item->product->product_name }}</h5>
                            <p class="card-text text-muted">{{ $item->product->type->type_name ?? 'غير محدد' }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold fs-5 text-gold">{{ number_format($item->product->price, 2) }} $</span>
                                @if ($item->product->rating)
                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $item->product->rating)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $item->product->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <small class="text-muted">({{ $item->product->rating }})</small>
                                    </div>
                                @else
                                    <small class="text-muted">لا توجد تقييمات</small>
                                @endif
                            </div>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('products.show', $item->product->id) }}" class="btn btn-outline-info btn-sm">عرض التفاصيل <i class="fas fa-eye ms-1"></i></a>
                                <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-success btn-sm">إضافة للسلة <i class="fas fa-cart-plus ms-1"></i></button>
                                </form>
                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="d-inline ms-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد إزالة هذا المنتج من المفضلة؟')" data-bs-toggle="tooltip" data-bs-placement="top" title="إزالة من المفضلة">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection