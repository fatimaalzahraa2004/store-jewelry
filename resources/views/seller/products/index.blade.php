@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-boxes me-2"></i> منتجاتي</h2>
        <a href="{{ route('seller.products.create') }}" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i> إضافة منتج جديد</a>
    </div>

    @if ($products->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لم تقم بإضافة أي منتجات بعد. <a href="{{ route('seller.products.create') }}" class="alert-link">ابدأ الآن!</a>
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
                                <th scope="col">النوع</th>
                                <th scope="col">السعر</th>
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
                                    <td>{{ $product->type->type_name ?? 'غير محدد' }}</td>
                                    <td class="text-gold fw-bold">{{ number_format($product->price, 2) }} $</td>
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
                                        <a href="{{ route('seller.products.show', $product->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        @if ($product->status != 'تم البيع') {{-- لا يمكن تعديل أو حذف منتج تم بيعه --}}
                                            <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟ لا يمكن التراجع عن هذا الإجراء.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection