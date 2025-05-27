@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-boxes me-2"></i> إدارة المنتجات (المدير)</h2>

    {{-- قسم الفلاتر --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label for="status" class="form-label visually-hidden">الحالة</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">جميع الحالات</option>
                        <option value="قيد التحقق" {{ request('status') == 'قيد التحقق' ? 'selected' : '' }}>قيد التحقق</option>
                        <option value="تم الإضافة" {{ request('status') == 'تم الإضافة' ? 'selected' : '' }}>تم الإضافة</option>
                        <option value="تم الرفض" {{ request('status') == 'تم الرفض' ? 'selected' : '' }}>تم الرفض</option>
                        <option value="تم البيع" {{ request('status') == 'تم البيع' ? 'selected' : '' }}>تم البيع</option>
                    </select>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i> فلترة</button>
                </div>
            </form>
        </div>
    </div>

    @if ($products->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد منتجات مطابقة لمعايير الفلترة.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">صورة</th>
                                <th scope="col">اسم المنتج</th>
                                <th scope="col">السعر</th>
                                <th scope="col">البائع</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($product->album_photos && count($product->album_photos) > 0)
                                            <img src="{{ asset('storage/' . $product->album_photos[0]) }}" alt="{{ $product->product_name }}" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/placeholder.png') }}" alt="صورة غير متوفرة" class="img-fluid rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td class="text-gold fw-bold">{{ number_format($product->price, 2) }} $</td>
                                    <td>{{ $product->owner->full_name ?? 'غير معروف' }}</td>
                                    <td>
                                        <span class="badge {{
                                            $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                            ($product->status == 'تم الإضافة' ? 'bg-success' :
                                            ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                                        }}">
                                            {{ $product->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ سيتم حذف جميع البيانات المتعلقة به.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection