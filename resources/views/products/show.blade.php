@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-gem me-2"></i> {{ $product->product_name }}</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                @foreach ($product->album_photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 rounded product-image-zoom" alt="{{ $product->product_name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/placeholder.png') }}" class="d-block w-100 rounded product-image-zoom" alt="صورة غير متوفرة" style="height: 400px; object-fit: contain;">
                                </div>
                            @endif
                        </div>
                        @if ($product->album_photos && count($product->album_photos) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-icon-custom"><i class="fas fa-chevron-left fa-2x"></i></span>
                                <span class="visually-hidden">السابق</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-icon-custom"><i class="fas fa-chevron-right fa-2x"></i></span>
                                <span class="visually-hidden">التالي</span>
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-6 text-primary mb-3">{{ $product->product_name }}</h1>
                    <p class="lead text-gold mb-4">{{ number_format($product->price, 2) }} $</p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            النوع:
                            <span>{{ $product->type->type_name ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الشكل:
                            <span>{{ $product->shape ?? 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الوزن:
                            <span>{{ $product->weight ? $product->weight . ' جرام' : 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البائع:
                            <span>{{ $product->owner->full_name ?? 'غير معروف' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            التقييم:
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
                                    <span class="text-muted">({{ $product->rating }})</span>
                                </div>
                            @else
                                <span class="text-muted">لا توجد تقييمات</span>
                            @endif
                        </li>
                    </ul>

                    @auth
                        @if (Auth::user()->isBuyer())
                            <form action="{{ route('cart.store') }}" method="POST" class="d-grid gap-2 mb-3">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">الكمية:</span>
                                    <input type="number" name="quantity" class="form-control" value="1" min="1" max="10" aria-label="الكمية">
                                </div>
                                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-cart-plus me-2"></i> إضافة إلى السلة</button>
                            </form>

                            {{-- زر المفضلة --}}
                            @if ($isProductInWishlist)
                                <form action="{{ route('wishlist.destroy', $wishlistItemId) }}" method="POST" class="d-grid gap-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-heart-crack me-2"></i> إزالة من المفضلة</button>
                                </form>
                            @else
                                <form action="{{ route('wishlist.store') }}" method="POST" class="d-grid gap-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-danger btn-lg"><i class="fas fa-heart me-2"></i> إضافة إلى المفضلة</button>
                                </form>
                            @endif
                        @else
                            <p class="alert alert-warning text-center">قم بتسجيل الدخول كمشتري لإضافة المنتج إلى السلة أو المفضلة.</p>
                        @endif
                    @else
                        <p class="alert alert-info text-center">يرجى <a href="{{ route('login') }}" class="alert-link">تسجيل الدخول</a> أو <a href="{{ route('register') }}" class="alert-link">إنشاء حساب</a> لإضافة المنتج إلى السلة أو المفضلة.</p>
                    @endauth
                </div>
            </div>

            {{-- قسم التقييمات والتعليقات --}}
            <div class="card shadow-lg mt-5 animate__animated animate__fadeInUp">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-comments me-2"></i> التقييمات والتعليقات ({{ $product->ratings->count() }})</h4>
                </div>
                <div class="card-body p-4">
                    @auth
                        @if (Auth::user()->isBuyer())
                            <div class="mb-4">
                                <h5>أضف تقييمك:</h5>
                                <form action="{{ route('ratings.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="mb-3">
                                        <label for="rating_value" class="form-label">تقييمك (من 0.5 إلى 5.0):</label>
                                        <input type="number" name="rating_value" id="rating_value" class="form-control @error('rating_value') is-invalid @enderror" step="0.5" min="0.5" max="5.0" value="{{ old('rating_value', $product->ratings->where('user_id', Auth::id())->first()->rating_value ?? '') }}" required>
                                        @error('rating_value')
                                            @php($message = $message ?? 'خطأ غير معروف')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">تعليقك (اختياري):</label>
                                        <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" rows="3">{{ old('comment', $product->ratings->where('user_id', Auth::id())->first()->comment ?? '') }}</textarea>
                                        @error('comment')
                                            @php($message = $message ?? 'خطأ غير معروف')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane me-2"></i> أرسل التقييم</button>
                                </form>
                            </div>
                            <hr>
                        @endif
                    @endauth

                    @if ($product->ratings->isEmpty())
                        <p class="text-center text-muted">لا توجد تقييمات لهذا المنتج بعد.</p>
                    @else
                        @foreach ($product->ratings as $rating)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title mb-1">
                                        <i class="fas fa-user-circle me-1"></i> {{ $rating->user->full_name ?? 'مستخدم غير معروف' }}
                                        <small class="text-muted float-end">{{ $rating->created_at->diffForHumans() }}</small>
                                    </h6>
                                    <div class="stars mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating->rating_value)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $rating->rating_value)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="fw-bold ms-1">{{ $rating->rating_value }}</span>
                                    </div>
                                    @if ($rating->comment)
                                        <p class="card-text">{{ $rating->comment }}</p>
                                    @endif

                                    @auth
                                        @if (Auth::id() === $rating->user_id)
                                            <form action="{{ route('ratings.destroy', $rating->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('هل أنت متأكد أنك تريد حذف تقييمك؟')"><i class="fas fa-trash-alt me-1"></i> حذف التقييم</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection