@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header bg-dark text-white text-center py-3">
            <h3 class="mb-0"><i class="fas fa-user-circle me-2"></i> تفاصيل المستخدم: {{ $user->full_name }}</h3>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5>المعلومات الشخصية:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الاسم الكامل:
                            <span>{{ $user->full_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            اسم المستخدم:
                            <span>{{ $user->username }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            البريد الإلكتروني:
                            <span>{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            النوع:
                            <span>{{ $user->gender }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ الميلاد:
                            <span>{{ $user->birth_date ? $user->birth_date->format('Y-m-d') : 'غير محدد' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            الدور:
                            <span class="badge {{
                                $user->role == 'مدير' ? 'bg-danger' :
                                ($user->role == 'بائع' ? 'bg-info' :
                                'bg-secondary')
                            }}">
                                {{ $user->role }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            تاريخ التسجيل:
                            <span>{{ $user->created_at->format('Y-m-d H:i') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    @if ($user->isSeller() && $user->products->isNotEmpty())
                        <h5>المنتجات التي يملكها (البائع):</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($user->products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">{{ $product->product_name }}</a>
                                    <span class="badge {{
                                        $product->status == 'قيد التحقق' ? 'bg-warning text-dark' :
                                        ($product->status == 'تم الإضافة' ? 'bg-success' :
                                        ($product->status == 'تم البيع' ? 'bg-info' : 'bg-danger'))
                                    }}">
                                        {{ $product->status }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @elseif ($user->isBuyer() && $user->orders->isNotEmpty())
                        <h5>الطلبات التي قام بها (المشتري):</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($user->orders as $order)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-decoration-none">طلب #{{ $order->id }}</a>
                                    <span class="badge {{
                                        $order->status == 'جديد' ? 'bg-warning text-dark' :
                                        ($order->status == 'تم الدفع' ? 'bg-success' :
                                        'bg-danger')
                                    }}">
                                        {{ $order->status }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted text-center mt-3">لا توجد بيانات إضافية لهذا المستخدم حالياً.</p>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit me-2"></i> تعديل المستخدم</a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i> العودة للمستخدمين</a>
                @if (Auth::id() !== $user->id && !$user->isAdmin())
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟ هذا الإجراء لا يمكن التراجع عنه.')"><i class="fas fa-trash-alt me-2"></i> حذف المستخدم</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection