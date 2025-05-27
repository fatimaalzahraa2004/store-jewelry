@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل نوع المنتج: {{ $productType->type_name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.product-types.update', $productType->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="type_name" class="form-label">اسم النوع <span class="text-danger">*</span></label>
                            <input type="text" name="type_name" id="type_name" class="form-control @error('type_name') is-invalid @enderror" value="{{ old('type_name', $productType->type_name) }}" required autofocus>
                            @error('type_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف (اختياري)</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $productType->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i> حفظ التغييرات</button>
                            <a href="{{ route('admin.product-types.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection