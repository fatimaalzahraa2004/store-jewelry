@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('{{ asset('images/jewelry_bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg border-0 rounded-lg mt-5 bg-white bg-opacity-90 animate__animated animate__fadeInDown">
            <div class="card-header bg-dark text-white text-center py-4">
                <h3 class="font-weight-light my-2"><i class="fas fa-lock me-2"></i> {{ __('تسجيل الدخول') }}</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('كلمة المرور') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('تذكرني') }}
                        </label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-3">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('هل نسيت كلمة المرور؟') }}
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            {{ __('تسجيل الدخول') }} <i class="fas fa-sign-in-alt ms-2"></i>
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <div class="text-center">
                    <p class="text-muted mb-3 fw-bold">أو سجل دخول بسرعة باستخدام حسابات الاختبار:</p>
                    <button type="button" class="btn btn-outline-danger btn-sm mb-2 w-100 d-flex align-items-center justify-content-center" data-email="admin@example.com" data-password="password" onclick="fillLoginFields(this)">
                        <i class="fas fa-user-shield me-2"></i> دخول كـ <span class="fw-bold">مدير</span>
                    </button>
                    <button type="button" class="btn btn-outline-info btn-sm mb-2 w-100 d-flex align-items-center justify-content-center" data-email="seller@example.com" data-password="password" onclick="fillLoginFields(this)">
                        <i class="fas fa-store me-2"></i> دخول كـ <span class="fw-bold">بائع</span>
                    </button>
                    <button type="button" class="btn btn-outline-success btn-sm w-100 d-flex align-items-center justify-content-center" data-email="buyer@example.com" data-password="password" onclick="fillLoginFields(this)">
                        <i class="fas fa-shopping-bag me-2"></i> دخول كـ <span class="fw-bold">مشتري</span>
                    </button>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small">ليس لديك حساب؟ <a href="{{ route('register') }}" class="fw-bold text-decoration-none">قم بإنشاء حساب!</a></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function fillLoginFields(button) {
        const email = button.dataset.email;
        const password = button.dataset.password;

        document.getElementById('email').value = email;
        document.getElementById('password').value = password;

        // يمكنك إزالة التعليق عن السطر التالي لتقديم النموذج تلقائيًا بعد الملء
        // document.querySelector('form').submit();
    }
</script>
@endpush
@endsection