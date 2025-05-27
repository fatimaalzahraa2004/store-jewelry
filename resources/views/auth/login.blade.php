{{-- في resources/views/auth/login.blade.php --}}
@extends('layouts.app') {{-- تأكد أن هذا يورث من تصميم أساسي --}}

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-image: url('{{ asset('images/jewelry_bg.jpg') }}'); background-size: cover;">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg border-0 rounded-lg mt-5 bg-white bg-opacity-90">
            <div class="card-header bg-dark text-white text-center py-4">
                <h3 class="font-weight-light my-2">{{ __('تسجيل الدخول') }}</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label text-md-end">{{ __('البريد الإلكتروني') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-md-end">{{ __('كلمة المرور') }}</label>
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

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('هل نسيت كلمة المرور؟') }}
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary px-4 py-2">
                            {{ __('تسجيل الدخول') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small"><a href="{{ route('register') }}">ليس لديك حساب؟ قم بإنشاء حساب!</a></div>
            </div>
        </div>
    </div>
</div>
@endsection