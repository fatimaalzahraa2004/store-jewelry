<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط البائعون المصرح لهم يمكنهم إضافة منتجات
        return Auth::check() && Auth::user()->isSeller();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'type_id' => ['required', 'exists:product_types,id'],
            'album_photos' => ['array'], // لتلقي مصفوفة من الصور
            'album_photos.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000'], // لكل صورة فردية (5 ميجابايت)
            'shape' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'product_name.required' => 'اسم المنتج مطلوب.',
            'price.required' => 'سعر المنتج مطلوب.',
            'price.numeric' => 'السعر يجب أن يكون رقماً.',
            'price.min' => 'السعر يجب أن يكون أكبر من صفر.',
            'type_id.required' => 'نوع المنتج مطلوب.',
            'type_id.exists' => 'نوع المنتج المحدد غير صالح.',
            'album_photos.array' => 'يجب أن تكون الصور مصفوفة.',
            'album_photos.*.image' => 'يجب أن تكون الصور من نوع صورة.',
            'album_photos.*.mimes' => 'صيغ الصور المدعومة هي: jpeg, png, jpg, gif, webp.',
            'album_photos.*.max' => 'حجم الصورة لا يجب أن يتجاوز 5 ميجابايت.',
            'weight.numeric' => 'الوزن يجب أن يكون رقماً.',
            'weight.min' => 'الوزن يجب أن يكون موجباً.',
        ];
    }
}