@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-tags me-2"></i> إدارة أنواع المنتجات</h2>
        <a href="{{ route('admin.product-types.create') }}" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i> إضافة نوع جديد</a>
    </div>

    @if ($productTypes->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد أنواع منتجات لعرضها. <a href="{{ route('admin.product-types.create') }}" class="alert-link">ابدأ بإضافة نوع الآن!</a>
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم النوع</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productTypes as $type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ Str::limit($type->description, 70) ?? 'لا يوجد وصف' }}</td>
                                    <td>
                                        <a href="{{ route('admin.product-types.show', $type->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.product-types.edit', $type->id) }}" class="btn btn-primary btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.product-types.destroy', $type->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا النوع؟ سيتم تعيين المنتجات المرتبطة به إلى "بلا نوع".')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
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
            {{ $productTypes->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection