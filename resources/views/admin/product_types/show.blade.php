@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-tag me-2"></i> تفاصيل نوع المنتج: {{ $productType->type_name }}</h3>
        </div>
        <div class="card-body p-4">
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    اسم النوع:
                    <span>{{ $productType->type_name }}</span>
                </li>
                <li class="list-group-item">
                    الوصف:
                    <p class="text-muted mt-2">{{ $productType->description ?? 'لا يوجد وصف.' }}</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    تاريخ الإضافة:
                    <span>{{ $productType->created_at->format('Y-m-d H:i') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    آخر تحديث:
                    <span>{{ $productType->updated_at->format('Y-m-d H:i') }}</span>
                </li>
            </ul>

            <h5 class="mt-4 mb-3">المنتجات التابعة لهذا النوع (أمثلة):</h5>
            @if ($productType->products->isEmpty())
                <p class="text-center text-muted">لا توجد منتجات مرتبطة بهذا النوع حالياً.</p>
            @else
                <div class="row row-cols-1 row-cols-md-2 g-3">
                    @foreach ($productType->products->take(4) as $product) {{-- عرض 4 منتجات كحد أقصى --}}
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    @if ($product->album_photos && count($product->album_photos) > 0)
                                        <img src="{{ asset('storage/' . $product->album_photos[0]) }}" class="img-fluid rounded me-3" style="width: 70px; height: 70px; object-fit: cover;" alt="{{ $product->product_name }}">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}" class="img-fluid rounded me-3" style="width: 70px; height: 70px; object-fit: cover;" alt="صورة غير متوفرة">
                                    @endif
                                    <div>
                                        <h6 class="mb-0"><a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">{{ $product->product_name }}</a></h6>
                                        <small class="text-muted">{{ number_format($product->price, 2) }} $</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($productType->products->count() > 4)
                    <p class="text-center mt-3 text-muted">والمزيد من المنتجات...</p>
                @endif
            @endif

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.product-types.edit', $productType->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit me-2"></i> تعديل النوع</a>
                <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة لأنواع المنتجات</a>
                <form action="{{ route('admin.product-types.destroy', $productType->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا النوع؟')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt me-2"></i> حذف النوع</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection