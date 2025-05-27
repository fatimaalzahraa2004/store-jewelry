<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddToCartRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المستخدمون المسجلون (المشترون) يمكنهم إضافة إلى السلة
        return Auth::check() && Auth::user()->isBuyer();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'معرف المنتج مطلوب.',
            'product_id.exists' => 'المنتج المحدد غير موجود.',
            'quantity.required' => 'الكمية مطلوبة.',
            'quantity.integer' => 'الكمية يجب أن تكون عدداً صحيحاً.',
            'quantity.min' => 'الكمية يجب أن تكون 1 على الأقل.',
        ];
    }
}