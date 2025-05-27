@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-receipt me-2"></i> إدارة الطلبات (المدير)</h2>

    {{-- قسم الفلاتر --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.orders.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label for="status" class="form-label visually-hidden">الحالة</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">جميع الحالات</option>
                        <option value="جديد" {{ request('status') == 'جديد' ? 'selected' : '' }}>جديد</option>
                        <option value="تم الدفع" {{ request('status') == 'تم الدفع' ? 'selected' : '' }}>تم الدفع</option>
                        <option value="ملغي" {{ request('status') == 'ملغي' ? 'selected' : '' }}>ملغي</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter me-2"></i> فلترة</button>
                </div>
            </form>
        </div>
    </div>

    @if ($orders->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لا توجد طلبات لعرضها.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># الطلب</th>
                                <th scope="col">العميل</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">الإجمالي</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $orderItem)
                                <tr>
                                    <td>#{{ $orderItem->id }}</td>
                                    <td><a href="{{ route('admin.users.show', $orderItem->user->id) }}">{{ $orderItem->user->full_name }}</a></td>
                                    <td>{{ $orderItem->order_date->format('Y-m-d H:i') }}</td>
                                    <td>{{ number_format($orderItem->total_price, 2) }} $</td>
                                    <td>
                                        <span class="badge {{
                                            $orderItem->status == 'جديد' ? 'bg-warning text-dark' :
                                            ($orderItem->status == 'تم الدفع' ? 'bg-success' :
                                            'bg-danger')
                                        }}">
                                            {{ $orderItem->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $orderItem->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض"><i class="fas fa-eye"></i></a>
                                        <form action="{{ route('admin.orders.destroy', $orderItem->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟ سيتم حذف جميع عناصره.')" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></button>
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
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection