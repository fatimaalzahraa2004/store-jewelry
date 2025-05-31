@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-gem me-2"></i> {{ $product->product_name }} (إدارة المدير)</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                @foreach ($product->album_photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        {{-- 🔴🔴🔴 إضافة الكلاس product-image-zoom 🔴🔴🔴 --}}
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 rounded product-image-zoom" alt="{{ $product->product_name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    {{-- 🔴🔴🔴 إضافة الكلاس product-image-zoom 🔴🔴🔴 --}}
                                    <img src="{{ asset('images/placeholder.png') }}" class="d-block w-100 rounded product-image-zoom" alt="صورة غير متوفرة" style="height: 400px; object-fit: contain;">
                                </div>
                            @endif
                        </div>
                        @if ($product->album_photos && count($product->album_photos) > 1)
                            {{-- 🔴🔴🔴 تعديل أزرار الكاروسيل لاستخدام الأيقونات المخصصة 🔴🔴🔴 --}}
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
                            <span>{{ $product->owner->full_name ?? 'غير معروف' }} (<a href="{{ route('admin.users.show', $product->owner->id) }}">{{ $product->owner->email ?? '' }}</a>)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحالة الحالية:
                            <span class="badge {{
                                $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                ($product->status == 'تم الإضافة' ? 'bg-success' :
                                ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                            }}">
                                {{ $product->status }}
                            </span>
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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الإضافة:
                            <span>{{ $product->created_at->format('Y-m-d H:i') }}</span>
                        </li>
                    </ul>

                    <h5 class="mt-4 mb-3">تغيير حالة المنتج:</h5>
                    <form action="{{ route('admin.products.update_status', $product->id) }}" method="POST" class="mb-3">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3">
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="قيد التحقق" {{ $product->status == 'قيد التحقق' ? 'selected' : '' }}>قيد التحقق</option>
                                <option value="تم الإضافة" {{ $product->status == 'تم الإضافة' ? 'selected' : '' }}>تم الإضافة</option>
                                <option value="تم الرفض" {{ $product->status == 'تم الرفض' ? 'selected' : '' }}>تم الرفض</option>
                                <option value="تم البيع" {{ $product->status == 'تم البيع' ? 'selected' : '' }}>تم البيع</option>
                            </select>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> تحديث الحالة</button>
                            @error('status')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </form>

                    <div class="d-grid gap-2 mt-4">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> العودة لقائمة المنتجات</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg w-100" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ سيتم حذف جميع البيانات المتعلقة به.')"><i class="fas fa-trash-alt me-2"></i> حذف المنتج نهائياً</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- قسم التقييمات (للمراجعة من قبل المدير) --}}
            <div class="card shadow-lg mt-5 animate__animated animate__fadeInUp">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0"><i class="fas fa-comments me-2"></i> تقييمات المنتج ({{ $product->ratings->count() }})</h4>
                </div>
                <div class="card-body p-4">
                    @if ($product->ratings->isEmpty())
                        <p class="text-center text-muted">لا توجد تقييمات لهذا المنتج بعد.</p>
                    @else
                        @foreach ($product->ratings as $rating)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title mb-1">
                                        <i class="fas fa-user-circle me-1"></i> <a href="{{ route('admin.users.show', $rating->user->id) }}" class="text-decoration-none">{{ $rating->user->full_name ?? 'مستخدم غير معروف' }}</a>
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
                                    {{-- يمكن إضافة زر لحذف التقييم من هنا للمدير --}}
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