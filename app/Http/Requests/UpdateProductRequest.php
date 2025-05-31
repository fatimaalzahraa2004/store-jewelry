<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; // تأكد من استيراد هذا النموذج

class UpdateProductRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     * Laravel سيقوم تلقائياً بربط نموذج Product بناءً على معرّف المسار.
     */
    public function authorize(Product $product): bool // ⬅️ التعديل هنا: استقبل النموذج مباشرة
    {
        // الآن $product هو كائن نموذج Product المحول تلقائياً (ID 105 في حالتك)
        // لا حاجة لـ Product::findOrFail($this->route('product'));
        return Auth::check() && Auth::user()->isSeller() ;
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
            'album_photos' => ['array', 'nullable'],
            'album_photos.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5000'],
            'shape' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'album_photos.array' => 'يجب أن تكون الصور مصفوفة.',
            'album_photos.*.image' => 'يجب أن تكون الصور من نوع صورة.',
            'album_photos.*.mimes' => 'صيغ الصور المدعومة هي: jpeg, png, jpg, gif, webp.',
            'album_photos.*.max' => 'حجم الصورة لا يجب أن يتجاوز 5 ميجابايت.',
            // ... باقي الرسائل
        ];
    }
}