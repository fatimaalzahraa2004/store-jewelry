@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-box me-2"></i> طلباتي</h2>

    @if ($orders->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            لم تقم بأي طلبات بعد.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># الطلب</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">الإجمالي</th>
                                <th scope="col">الحالة</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->order_date->format('Y-m-d H:i') }}</td>
                                    <td>{{ number_format($order->total_price, 2) }} $</td>
                                    <td>
                                        <span class="badge {{
                                            $order->status == 'جديد' ? 'bg-warning text-dark' :
                                            ($order->status == 'تم الدفع' ? 'bg-success' :
                                            'bg-danger')
                                        }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="عرض التفاصيل"><i class="fas fa-eye"></i></a>
                                        @if ($order->status == 'جديد')
                                            <form action="{{ route('orders.pay', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('هل أنت متأكد من رغبتك في الدفع الآن؟')" data-bs-toggle="tooltip" data-bs-placement="top" title="الدفع الآن"><i class="fas fa-credit-card"></i> الدفع</button>
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