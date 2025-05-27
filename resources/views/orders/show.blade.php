@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-receipt me-2"></i> تفاصيل الطلب #{{ $order->id }}</h3>
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
                            الحالة:
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
                            <span>{{ $order->user->full_name }}</span>
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
                                        <a href="{{ route('products.show', $item->product->id) }}" class="text-decoration-none">{{ $item->product->product_name }}</a>
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

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة للطلبات</a>
                @if ($order->status == 'جديد' && Auth::user()->isBuyer())
                    <form action="{{ route('orders.pay', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="fas fa-credit-card me-2"></i> إتمام الدفع</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection