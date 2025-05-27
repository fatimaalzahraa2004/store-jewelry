<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProductTypeRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً لتقديم هذا الطلب.
     */
    public function authorize(): bool
    {
        // فقط المشرفون يمكنهم تحديث أنواع منتجات
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * الحصول على قواعد التحقق التي تنطبق على الطلب.
     */
    public function rules(): array
    {
        return [
            'type_name' => ['sometimes', 'required', 'string', 'max:255', Rule::unique('product_types', 'type_name')->ignore($this->route('product_type'))],
            'description' => ['nullable', 'string'],
        ];
    }

    /**
     * الحصول على رسائل الخطأ المخصصة لقواعد التحقق.
     */
    public function messages(): array
    {
        return [
            'type_name.required' => 'اسم نوع المنتج مطلوب.',
            'type_name.unique' => 'اسم نوع المنتج هذا موجود بالفعل.',
        ];
    }
}