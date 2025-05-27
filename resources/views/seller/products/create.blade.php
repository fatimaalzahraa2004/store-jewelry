@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-plus-circle me-2"></i> إضافة منتج جديد</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="product_name" class="form-label">اسم المنتج <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" required>
                            @error('product_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">السعر ($) <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" step="0.01" min="0.01" value="{{ old('price') }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_id" class="form-label">نوع المنتج <span class="text-danger">*</span></label>
                                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror" required>
                                    <option value="">اختر النوع</option>
                                    @foreach ($productTypes as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->type_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="album_photos" class="form-label">صور المنتج (يمكنك رفع عدة صور)</label>
                            <input type="file" name="album_photos[]" id="album_photos" class="form-control @error('album_photos.*') is-invalid @enderror" multiple accept="image/*">
                            @error('album_photos.*')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            @error('album_photos')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <small class="form-text text-muted">الصيغ المدعومة: JPG, PNG, GIF, WEBP. الحد الأقصى للحجم: 5 ميجابايت للصورة الواحدة.</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="shape" class="form-label">الشكل (مثال: خاتم، سوار، قلادة)</label>
                                <input type="text" name="shape" id="shape" class="form-control @error('shape') is-invalid @enderror" value="{{ old('shape') }}">
                                @error('shape')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="form-label">الوزن (جرام)</label>
                                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" step="0.01" min="0" value="{{ old('weight') }}">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-plus me-2"></i> إضافة المنتج</button>
                            <a href="{{ route('seller.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection