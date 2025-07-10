@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('{{ asset('images/jewelry_bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="col-md-7 col-lg-5"> {{-- زيادة عرض العمود قليلاً لاستيعاب الحقول الإضافية --}}
        <div class="card shadow-lg border-0 rounded-lg mt-5 bg-white bg-opacity-90 animate__animated animate__fadeInDown">
            <div class="card-header bg-dark text-white text-center py-4">
                <h3 class="font-weight-light my-2"><i class="fas fa-user-plus me-2"></i> {{ __('إنشاء حساب جديد') }}</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- الاسم الأول والأخير --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">{{ __('الاسم الأول') }}</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">{{ __('الاسم الأخير') }}</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- اسم المستخدم والبريد الإلكتروني --}}
                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('اسم المستخدم') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- كلمة المرور وتأكيدها --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('كلمة المرور') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('تأكيد كلمة المرور') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    {{-- النوع وتاريخ الميلاد --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="gender" class="form-label">{{ __('النوع') }}</label>
                            <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="">اختر الجنس</option>
                                <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                                <option value="أنثى" {{ old('gender') == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="birth_date" class="form-label">{{ __('تاريخ الميلاد') }} (اختياري)</label>
                            <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- اختيار الدور (مستخدم عادي أو بائع) --}}
                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('تسجيل كـ') }}</label>
                        <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="مستخدم عادي" {{ old('role') == 'مستخدم عادي' ? 'selected' : '' }}>مشتري (مستخدم عادي)</option>
                            <option value="بائع" {{ old('role') == 'بائع' ? 'selected' : '' }}>بائع</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {{ __('إنشاء الحساب') }} <i class="fas fa-arrow-circle-right ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small">لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="fw-bold text-decoration-none">سجل الدخول من هنا!</a></div>
            </div>
        </div>
    </div>
</div>
@endsection