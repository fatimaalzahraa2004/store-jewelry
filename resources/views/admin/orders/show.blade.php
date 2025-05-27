@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-receipt me-2"></i> تفاصيل الطلب #{{ $order->id }} (المدير)</h3>
        </div>
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>معلومات الطلب:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الطلب:
                            <span>{{ $order->order_date->format('Y-m-d H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الحالة الحالية:
                            <span class="badge {{
                                $order->status == 'جديد' ? 'bg-warning text-dark' :
                                ($order->status == 'تم الدفع' ? 'bg-success' :
                                'bg-danger')
                            }}">
                                {{ $order->status }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fs-5 text-primary">
                            الإجمالي الكلي:
                            <span class="fw-bold">{{ number_format($order->total_price, 2) }} $</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>معلومات العميل:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الاسم:
                            <span><a href="{{ route('admin.users.show', $order->user->id) }}">{{ $order->user->full_name }}</a></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البريد الإلكتروني:
                            <span>{{ $order->user->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <h5 class="mb-3">عناصر الطلب:</h5>
            @if ($order->items->isEmpty())
                <p class="text-center text-muted">لا توجد عناصر في هذا الطلب.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-light">
                            <tr>
                                <th>المنتج</th>
                                <th>الكمية</th>
                                <th>السعر الفردي</th>
                                <th>الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="{{ $item->product->album_photos && count($item->product->album_photos) > 0 ? asset('storage/' . $item->product->album_photos[0]) : asset('images/placeholder.png') }}" class="img-fluid rounded me-2" style="width: 50px; height: 50px; object-fit: cover;" alt="{{ $item->product->product_name }}">
                                        <a href="{{ route('admin.products.show', $item->product->id) }}" class="text-decoration-none">{{ $item->product->product_name }}</a>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->product->price, 2) }} $</td>
                                    <td>{{ number_format($item->total_price, 2) }} $</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-start">الإجمالي الكلي للطلب:</th>
                                <th class="text-end">{{ number_format($order->total_price, 2) }} $</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif

            <h5 class="mt-4 mb-3">تغيير حالة الطلب:</h5>
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="mb-3">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="جديد" {{ $order->status == 'جديد' ? 'selected' : '' }}>جديد</option>
                        <option value="تم الدفع" {{ $order->status == 'تم الدفع' ? 'selected' : '' }}>تم الدفع</option>
                        <option value="ملغي" {{ $order->status == 'ملغي' ? 'selected' : '' }}>ملغي</option>
                    </select>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> تحديث الحالة</button>
                    @error('status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </form>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة للطلبات</a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟ هذا الإجراء لا يمكن التراجع عنه.')"><i class="fas fa-trash-alt me-2"></i> حذف الطلب</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection