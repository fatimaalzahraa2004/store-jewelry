@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-check-circle me-2"></i> تأكيد عملية الدفع</h3>
                </div>
                <div class="card-body p-4 text-center">
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
                            <i class="fas fa-check-circle fa-2x me-3"></i>
                            <div>
                                <h4 class="alert-heading">عملية الدفع تمت بنجاح!</h4>
                                <p class="mb-0">شكراً لك على طلبك. لقد تم استلام دفعتك بنجاح وسيتم تجهيز طلبك قريباً.</p>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger d-flex align-items-center justify-content-center" role="alert">
                            <i class="fas fa-times-circle fa-2x me-3"></i>
                            <div>
                                <h4 class="alert-heading">فشل عملية الدفع!</h4>
                                <p class="mb-0">حدث خطأ أثناء معالجة دفعتك. يرجى المحاولة مرة أخرى أو الاتصال بالدعم الفني.</p>
                            </div>
                        </div>
                    @endif

                    <div class="mt-4">
                        <p class="lead">يمكنك مراجعة حالة طلباتك من صفحة الطلبات.</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary btn-lg me-2"><i class="fas fa-box me-2"></i> عرض طلباتي</a>
                        <a href="{{ route('products.index') }}" class="btn btn-info btn-lg"><i class="fas fa-gem me-2"></i> مواصلة التسوق</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection