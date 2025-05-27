@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-shopping-cart me-2"></i> سلة التسوق</h2>

    @if ($cartItems->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            سلة التسوق الخاصة بك فارغة. <a href="{{ route('products.index') }}" class="alert-link">ابدأ التسوق الآن!</a>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">عناصر السلة</div>
                    <ul class="list-group list-group-flush">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex align-items-center justify-content-between p-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $item->product->album_photos && count($item->product->album_photos) > 0 ? asset('storage/' . $item->product->album_photos[0]) : asset('images/placeholder.png') }}" class="img-fluid rounded me-3" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $item->product->product_name }}">
                                    <div>
                                        <h5 class="mb-1">{{ $item->product->product_name }}</h5>
                                        <p class="mb-1 text-muted">{{ $item->product->type->type_name ?? 'غير محدد' }}</p>
                                        <p class="mb-0 fw-bold text-gold">{{ number_format($item->product->price, 2) }} $</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center me-3">
                                        @csrf
                                        @method('PUT')
                                        <label for="quantity-{{ $item->id }}" class="visually-hidden">الكمية</label>
                                        <input type="number" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1" max="10" class="form-control form-control-sm text-center" style="width: 70px;" onchange="this.form.submit()">
                                    </form>
                                    <span class="fw-bold fs-5 text-dark me-3">{{ number_format($item->total_price, 2) }} $</span>
                                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد إزالة هذا المنتج من السلة؟')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">ملخص السلة</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                إجمالي سعر المنتجات:
                                <span class="fw-bold">{{ number_format($cartItems->sum('total_price'), 2) }} $</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                رسوم الشحن:
                                <span class="fw-bold">0.00 $</span> {{-- يمكن إضافة منطق لحساب رسوم الشحن --}}
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center fs-5 text-primary">
                                الإجمالي الكلي:
                                <span class="fw-bold">{{ number_format($cartItems->sum('total_price'), 2) }} $</span>
                            </li>
                        </ul>
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg d-block w-100"><i class="fas fa-money-check-alt me-2"></i> إتمام الشراء</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection