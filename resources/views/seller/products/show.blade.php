@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-gem me-2"></i> {{ $product->product_name }} (تفاصيل المنتج)</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                @foreach ($product->album_photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100 rounded" alt="{{ $product->product_name }}" style="height: 400px; object-fit: contain;">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/placeholder.png') }}" class="d-block w-100 rounded" alt="صورة غير متوفرة" style="height: 400px; object-fit: contain;">
                                </div>
                            @endif
                        </div>
                        @if ($product->album_photos && count($product->album_photos) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">السابق</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
                            الحالة:
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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            آخر تحديث:
                            <span>{{ $product->updated_at->format('Y-m-d H:i') }}</span>
                        </li>
                    </ul>

                    <div class="d-grid gap-2 mt-4">
                        @if ($product->status != 'تم البيع')
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-primary btn-lg"><i class="fas fa-edit me-2"></i> تعديل المنتج</a>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg w-100" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ لا يمكن التراجع عن هذا الإجراء.')"><i class="fas fa-trash-alt me-2"></i> حذف المنتج</button>
                            </form>
                        @else
                            <div class="alert alert-info text-center" role="alert">
                                هذا المنتج تم بيعه ولا يمكن تعديله أو حذفه.
                            </div>
                        @endif
                        <a href="{{ route('seller.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> العودة لقائمة المنتجات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection