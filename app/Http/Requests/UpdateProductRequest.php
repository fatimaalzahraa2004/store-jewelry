<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // استيراد نموذج المنتج

class UpdateProductRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // يجب أن يكون المستخدم بائعاً وأن يكون مالك المنتج
        $product = Product::findOrFail($this->route('product')); // افتراض أن الـ route parameter هو 'product'
        return Auth::check() && Auth::user()->isSeller() && Auth::id() === $product->owner_user_id;
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_name' => ['sometimes', 'required', 'string', 'max:255'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0.01'],
            'type_id' => ['sometimes', 'required', 'exists:product_types,id'],
            'album_photos' => ['array'], // لتلقي مصفوفة من الصور
            'album_photos.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000'], // لكل صورة فردية
            'shape' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            // لا يمكن للبائع تغيير الحالة مباشرة، فقط المشرف
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