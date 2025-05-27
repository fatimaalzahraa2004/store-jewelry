@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل المنتج: {{ $product->product_name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="product_name" class="form-label">اسم المنتج <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name', $product->product_name) }}" required>
                            @error('product_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">السعر ($) <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" step="0.01" min="0.01" value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_id" class="form-label">نوع المنتج <span class="text-danger">*</span></label>
                                <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror" required>
                                    <option value="">اختر النوع</option>
                                    @foreach ($productTypes as $type)
                                        <option value="{{ $type->id }}" {{ (old('type_id', $product->type_id) == $type->id) ? 'selected' : '' }}>
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
                            <label for="album_photos" class="form-label">صور المنتج (يمكنك رفع صور جديدة لتغيير الصور الحالية)</label>
                            <input type="file" name="album_photos[]" id="album_photos" class="form-control @error('album_photos.*') is-invalid @enderror" multiple accept="image/*">
                            @error('album_photos.*')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            @error('album_photos')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <small class="form-text text-muted">الصيغ المدعومة: JPG, PNG, GIF, WEBP. الحد الأقصى للحجم: 5 ميجابايت للصورة الواحدة.</small>
                            @if ($product->album_photos && count($product->album_photos) > 0)
                                <div class="mt-3">
                                    <h6>الصور الحالية:</h6>
                                    <div class="d-flex flex-wrap">
                                        @foreach ($product->album_photos as $photo)
                                            <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail me-2 mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="صورة منتج">
                                        @endforeach
                                    </div>
                                    <small class="text-muted">ستحل الصور الجديدة محل الصور الحالية.</small>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="shape" class="form-label">الشكل (مثال: خاتم، سوار، قلادة)</label>
                                <input type="text" name="shape" id="shape" class="form-control @error('shape') is-invalid @enderror" value="{{ old('shape', $product->shape) }}">
                                @error('shape')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="weight" class="form-label">الوزن (جرام)</label>
                                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" step="0.01" min="0" value="{{ old('weight', $product->weight) }}">
                                @error('weight')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i> حفظ التغييرات</button>
                            <a href="{{ route('seller.products.index') }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> إلغاء</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection